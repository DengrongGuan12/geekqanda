<?php
/**
 * Created by IntelliJ IDEA.
 * User: soft
 * Date: 2014/10/18
 * Time: 10:37
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Globals
{

    function __construct($config = array() ){
        foreach ($config as $key => $value) {
            $data[$key] = $value;
        }

        $CI =& get_instance();//这一行必须加

        $CI->load->vars($data);
    }
}