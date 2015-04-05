<?php

Yii::import('application.models._base.BaseTahans');

class Tahans extends BaseTahans
{
    /**
     * @return Tahans
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Tahans|Tahans', $n);
    }

}