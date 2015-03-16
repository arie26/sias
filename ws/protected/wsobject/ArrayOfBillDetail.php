<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:19 AM
 */

class ArrayOfBillDetail
{
    /**
     * @var BillDetail[] billDetails
     * @soap
     */
    public $billDetails = array();

    public function push($billDetail)
    {
        $this->billDetails[] = $billDetail;
    }

}