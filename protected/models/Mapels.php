<?php

Yii::import('application.models._base.BaseMapels');

class Mapels extends BaseMapels
{
    /**
     * @return Mapels
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Mapels|Mapels', $n);
    }

}