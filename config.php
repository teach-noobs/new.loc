<?php
/**
 * Created by PhpStorm.
 * User: daniiltserin
 * Date: 21.11.2016
 * Time: 19:49
 */
function __autoload($classname){
    switch($classname[0])
    {
        case 'C':
            include_once("c/$classname.php");
            break;
        case 'M':
            include_once("m/$classname.php");
            break;
    }
}