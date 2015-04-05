<?php

Yii::import('application.models._base.BaseBagkels');

class Bagkels extends BaseBagkels
{
    /**
     * @return Bagkels
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Bagkels|Bagkels', $n);
    }

}