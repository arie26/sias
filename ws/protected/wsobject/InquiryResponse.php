<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:18 AM
 */


class InquiryResponse
{
    /**
     * @var InquiryResult
     * @soap
     */
    public $inquiryResult;

    public function __construct($inquiryResponse = null)
    {
        $this->inquiryResult = new InquiryResult();
    }
}