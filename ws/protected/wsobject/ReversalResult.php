<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:37 AM
 */

class ReversalResult
{
    /**
     * @var Status
     * @soap
     */
    public $status;

    public function __construct($reversalResult = null)
    {
        $this->status = new Status();
    }
}