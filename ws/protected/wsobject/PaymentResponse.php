<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:35 AM
 */

class PaymentResponse
{
    /**
     * @var PaymentResult
     * @soap
     */
    public $paymentResult;

    public function __construct()
    {
        $this->paymentResult = new PaymentResult();
    }
}