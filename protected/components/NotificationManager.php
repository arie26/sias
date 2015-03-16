<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 8/4/14
 * Time: 1:47 PM
 */

class NotificationManager extends CApplicationComponent {
    public function getPendingApprovals(){
        $pending_approvals = [];
        $pending_approvals['event'] = Exams::model()->findAllByUser("status = 0");
        $pending_approvals['register'] = Registrants::model()->findAllByUser("registrants.status = 0");
        $pending_approvals['nilai'] = Registrants::model()->findAllByUser("registrants.status = 3");

        $pending_approvals['total_count'] = count($pending_approvals['event']) + count($pending_approvals['register'])
            + count($pending_approvals['nilai']);
        return $pending_approvals;
    }

    public function getNotifications(){
        $notifMessages = array();

        //notification too many
        $exams = Exams::model()->findAllByUser();

        $connection = Yii::app()->db;
        $command = $connection->createCommand("select MAX(`date_end`) as 'maxDate' from `exams`");
        $row = $command->queryRow();

        if (!empty($row['maxDate'])){
            $maxDate = DateTime::createFromFormat('Y-m-d', $row['maxDate']);

            $checkDate = new DateTime();
            $checkDate->setTime(0,0,0);

            while (($checkDate->diff($maxDate)->invert == 0)){
                $occured = 0;
                foreach ($exams as $exam){
                    $start = DateTime::createFromFormat('Y-m-d', $exam->date_start);
                    $end= DateTime::createFromFormat('Y-m-d', $exam->date_end);
                    if (($start->diff($checkDate)->invert==0) && ($checkDate->diff($end)->invert==0)){
                        $occured++;
                    }
                }

                $examConfig = Yii::app()->config->get('exam');
                if ($occured > $examConfig['max_per_day']){
                    $notifMessages[] = "Terlalu banyak pelatihan, tgl ".$checkDate->format('Y-m-d') ;
                }
                $checkDate->modify("+1 days");
            }
        }
        //notification event on holiday

        return $notifMessages;
    }

    public function getRecentExams(){
        if (Yii::app()->session['role']=='admin' || Yii::app()->session['role']=='sdppi'){
            $lastExams = Exams::model()->findAll(array(
                "condition" => "date_start > now() AND status = 2",
                "order" => "date_start ASC",
                "limit" => 5,
            ));
        }else if (Yii::app()->session['role']=='lemdik'){
            $id_lemdik = Yii::app()->session['id_lemdik'];
            $lastExams = Exams::model()->findAll(array(
                "condition" => "date_start > now() AND id_lemdik = '".$id_lemdik."' AND status = 2",
                "order" => "date_start ASC",
                "limit" => 5,
            ));
        }
        return $lastExams;
    }


}