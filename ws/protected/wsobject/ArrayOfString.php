<?php
/**
 * Created by PhpStorm.
 * User: Hanip
 * Date: 9/11/14
 * Time: 10:35 AM
 */

class ArrayOfString
{
    /**
     * @var string[] strings
     * @soap
     */
    public $strings = array();

    public function push($string)
    {
        $this->strings[] = $string;
    }
} 