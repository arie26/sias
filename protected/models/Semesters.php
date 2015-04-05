<?php

Yii::import('application.models._base.BaseSemesters');

class Semesters extends BaseSemesters
{
    /**
     * @return Semesters
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Semesters|Semesters', $n);
    }

}