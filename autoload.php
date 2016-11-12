<?php
/*
 * retrieves a class by its namespace
 */
define('DIR', __DIR__.'/');
function __autoload($class){
    $class = str_replace("\\", "/", $class);
    include DIR.$class.".php";
}