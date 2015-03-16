<?php

Yii::import('application.models._base.BaseGuru');

class Guru extends BaseGuru
{
    /**
     * @return Guru
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Guru|Gurus', $n);
    }

}