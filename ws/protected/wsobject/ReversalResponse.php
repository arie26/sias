<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:37 AM
 */

class ReversalResponse
{
    /**
     * @var ReversalResult
     * @soap
     */
    public $reversalResult;

    public function __construct($reversalResponse = null)
    {
        $this->reversalResult = new ReversalResult();
    }
}