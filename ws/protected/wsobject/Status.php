<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:38 AM
 */

class Status
{
    /**
     * @var boolean
     * @soap
     */
    public $isError;
    /**
     * @var string
     * @soap
     */
    public $errorCode;
    /**
     * @var string
     * @soap
     */
    public $statusDescription;

    public function __construct($status = null)
    {
        $this->isError = false;
        $this->errorCode = '01';
        $this->statusDescription = 'gagal';
    }

    public static function createStatusSuccess()
    {
        $newObj = new Status();
        $newObj->isError = false;
        $newObj->errorCode = '00';
        $newObj->statusDescription = 'succeed';
        return $newObj;
    }

    public static function createStatusFailed($message = null)
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '01';
        if ($message != null){
            $newObj->statusDescription = $message;
        }else{
            $newObj->statusDescription = 'error';
        }
        return $newObj;
    }

    public static function createStatusInvalidAmount()
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '13';
        $newObj->statusDescription = 'invalid amount';
        return $newObj;
    }

    public static function createStatusInvalidReversal()
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '50';
        $newObj->statusDescription = 'invalid reversal';
        return $newObj;
    }

    public static function createStatusInvalidInvoiceID()
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '25';
        $newObj->statusDescription = 'invalid invoice id';
        return $newObj;
    }

    public static function createStatusInvalidClientID()
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '26';
        $newObj->statusDescription = 'invalid client id';
        return $newObj;
    }

    public static function createStatusInvoiceAlreadyPaid()
    {
        $newObj = new Status();
        $newObj->isError = true;
        $newObj->errorCode = '97';
        $newObj->statusDescription = 'invoice already paid';
        return $newObj;
    }
}