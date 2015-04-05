<?php

Yii::import('application.models._base.BaseKelass');

class Kelass extends BaseKelass
{
    /**
     * @return Kelass
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Kelass|Kelasses', $n);
    }
	
	function getData() {
    $sql = "SELECT a.id_guru, a.nama 
			FROM guru a  
			where not exists (select 1 from kelas b 
			where a.id_guru = b.id_guru AND a.status = 1)";	

    $data = Yii::app()->db
        ->createCommand($sql)
        ->queryAll();
    return $data;
}

}