<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:07 AM
 */

class InquiryRequest {

    /**
     * @var string
     * @soap
     */
    public $language;
    /**
     * @var string
     * @soap
     */
    public $trxDateTime;
    /**
     * @var string
     * @soap
     */
    public $transmissionDateTime;
    /**
     * @var string
     * @soap
     */
    public $companyCode;
    /**
     * @var string
     * @soap
     */
    public $channelID;
    /**
     * @var string
     * @soap
     */
    public $billKey1;
    /**
     * @var string
     * @soap
     */
    public $billKey2;
    /**
     * @var string
     * @soap
     */
    public $billKey3;
    /**
     * @var string
     * @soap
     */
    public $reference1;
    /**
     * @var string
     * @soap
     */
    public $reference2;
    /**
     * @var string
     * @soap
     */
    public $reference3;

    public function __construct($inquiryRequest = null)
    {

    }
}