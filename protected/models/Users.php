<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
    /**
     * @return Users
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Users|Users', $n);
    }

}