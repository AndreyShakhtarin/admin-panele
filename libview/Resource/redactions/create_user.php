<?php
session_start();
error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');
require_once "../../../autoload.php";
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;
use libcontr\AuthController\CheckController;

$checking = new CheckController($_POST);
$checking_create = $checking->check_create();
print_r($checking_create);


$connect = new ConnectDB();
$connector = $connect->connect();
$query_insert = new QueriesDB($connector, $checking_create);
$result = $query_insert->insertUser();
$connect->destroy();
if($result){
    header('Location: /?success');
}else{
    header('Location: /?create');
}
