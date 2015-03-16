<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 11/5/14
 * Time: 5:08 PM
 */

class DwhActiveRecord extends CActiveRecord {
    private static $dbdwh = null;

    protected static function getDbDwhConnection()
    {
        if (self::$dbdwh !== null)
            return self::$dbdwh;
        else
        {
            self::$dbdwh = Yii::app()->dbDwh;
            if (self::$dbdwh instanceof CDbConnection)
            {
                self::$dbdwh->setActive(true);
                return self::$dbdwh;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
    }
}