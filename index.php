<?php
use libcontr\PageController\PageController;

require_once "autoload.php";

error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');



$page_layout = new PageController(array('layout' => ''), array('layout' => 'layout.php'));
$page_layout->getPage('layout');


?>