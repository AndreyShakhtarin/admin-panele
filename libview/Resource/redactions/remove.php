<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 25.08.16
 * Time: 13:55
 */
session_start();
error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');
require_once "../../../autoload.php";

use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;
use libcontr\AuthController\CheckController;

$login = $_POST['login_user'];
$db = new ConnectDB();
$connect = $db->connect();

$query = new QueriesDB($connect);
$result = $query->removeUser($login);

if($result){
    header('Location: /?success');
}else{
    header('Location: /?remove');
}