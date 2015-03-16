<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:19 AM
 */

class InquiryResult
{

    /**
     * @var string
     * @soap
     */
    public $currency;
    /**
     * @var string
     * @soap
     */
    public $billInfo1;
    /**
     * @var string
     * @soap
     */
    public $billInfo2;
    /**
     * @var string
     * @soap
     */
    public $billInfo3;
    /**
     * @var string
     * @soap
     */
    public $billInfo4;
    /**
     * @var string
     * @soap
     */
    public $billInfo5;
    /**
     * @var string
     * @soap
     */
    public $billInfo6;
    /**
     * @var string
     * @soap
     */
    public $billInfo7;
    /**
     * @var string
     * @soap
     */
    public $billInfo8;
    /**
     * @var string
     * @soap
     */
    public $billInfo9;
    /**
     * @var string
     * @soap
     */
    public $billInfo10;
    /**
     * @var string
     * @soap
     */
    public $billInfo11;
    /**
     * @var string
     * @soap
     */
    public $billInfo12;
    /**
     * @var string
     * @soap
     */
    public $billInfo13;
    /**
     * @var string
     * @soap
     */
    public $billInfo14;
    /**
     * @var string
     * @soap
     */
    public $billInfo15;
    /**
     * @var string
     * @soap
     */
    public $billInfo16;
    /**
     * @var string
     * @soap
     */
    public $billInfo17;
    /**
     * @var string
     * @soap
     */
    public $billInfo18;
    /**
     * @var string
     * @soap
     */
    public $billInfo19;
    /**
     * @var string
     * @soap
     */
    public $billInfo20;
    /**
     * @var string
     * @soap
     */
    public $billInfo21;
    /**
     * @var string
     * @soap
     */
    public $billInfo22;
    /**
     * @var string
     * @soap
     */
    public $billInfo23;
    /**
     * @var string
     * @soap
     */
    public $billInfo24;
    /**
     * @var string
     * @soap
     */
    public $billInfo25;
    /**
     * @var ArrayOfBillDetail
     * @soap
     */
    public $billDetails;
    /**
     * @var Status
     * @soap
     */
    public $status;

    public function __construct($inquiryResult = null)
    {
        $this->billInfo2 = (new DateTime())->format("Ymd");
        $this->billInfo3 = (new DateTime())->format("Ymd");
        $this->billDetails = new ArrayOfBillDetail();
        $this->status = new Status();

        //dummy
        $this->currency = "360";
        $this->billInfo1 = "test-dummy";
    }

    public function setBillInfo1($billInfo){
        $this->billInfo1 = $billInfo;
    }

}