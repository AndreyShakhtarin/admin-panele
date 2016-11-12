<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.08.16
 * Time: 2:01
 */
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;

if(!isset($_SESSION['login_user'])){
    @$_SESSION['login_user'] = $_POST['login_user'];
}

$data_user = explode("/", $_SERVER['REQUEST_URI']);
$user = $_SESSION['login_user'];

$db = new ConnectDB();
$connect = $db->connect();
$query = new QueriesDB($connect);
$user_data = $query->getUser($user);

$login = $user_data['login'];
$password = $user_data['password'];
$name = $user_data['name'];
$surname = $user_data['surname'];
$date = $query->getFormatDate();
$gender = $user_data['gender'];