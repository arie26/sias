<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:34 AM
 */

class BillDetail
{

    /**
     * @var string
     * @soap
     */
    public $billCode;
    /**
     * @var string
     * @soap
     */
    public $billName;
    /**
     * @var string
     * @soap
     */
    public $billShortName;
    /**
     * @var string
     * @soap
     */
    public $billAmount;
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

    public function __construct($billDetail = null)
    {
        $this->billCode = '01';
        $this->billShortName = 'reor';
        $this->reference1 = '';
        $this->reference2 = '';
        $this->reference3 = '';

        //dummy
        $this->billName = 'test-dummy';
        $this->billAmount = '999999';
    }

    public function save()
    {

    }
}