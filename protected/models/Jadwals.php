<?php

Yii::import('application.models._base.BaseJadwals');

class Jadwals extends BaseJadwals
{
    /**
     * @return Jadwals
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Jadwals|Jadwals', $n);
    }

}