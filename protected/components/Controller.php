<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


    public function swiftmailsend($to,$subject,$message, $attachment = null){
        $queue = new EmailQueue();
        $queue->to_email = $to;
        $queue->subject = $subject;
        $queue->from_email = Yii::app()->mailer->from;
        $queue->from_name = "Postel REOR";
        $queue->date_published = new CDbExpression('NOW()');
        $queue->message = $message;
        if ($attachment != null){
            //email not to be sent before the attachment prepared
            $queue->success = 1;
            $queue->save();
            $queue->addPdfAttachment($attachment);
        }else{
            $queue->save();
        }
        return $queue;
    }

    public function downloadFile($pathtofile, $filename){
        $file = Yii::app()->params['uploadFolder'].$pathtofile."/".$filename;
        Yii::log("start download :".$file);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
/*
    public function mailsend($to,$subject,$view, $data){
        //set properties
        $mail = new YiiMailer();
        $mail->setView($view);
        $mail->setData($data);
        $mail->setFrom('reor.postel@gmail.com', 'Reor Postel');
        $mail->setTo($to);
        $mail->setSubject($subject);

        $mail->setTo(Yii::app()->params['adminEmail']);
        $mail->setSmtp('smtp.gmail.com', 465, 'ssl', true, 'reor.postel@gmail.com', 'postel1234');

        if(!$mail->send()) {
            Yii::log("Mailer Error: " . $mail->ErrorInfo, "error");
        }else {
            Yii::log("Message ".$subject." to ".$to." sent!", "info");
        }
    }*/
}