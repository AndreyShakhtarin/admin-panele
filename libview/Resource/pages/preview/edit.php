<?php
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;

$db = new ConnectDB();
$connect = $db->connect();
$query = new QueriesDB($connect);
if(!isset($_SESSION['login_user'])){
    $_SESSION['login_user'] = $_POST['login_user'];
}
$login = $_SESSION['login_user'];

$user = $query->getUser($login);
$db->destroy();
$data_user = explode("/", $_SERVER['REQUEST_URI']);
if($user['gender'] == 'male'){
    $male = 'checked';
    $female = '';
}else{
    $male = '';
    $female = 'checked';
}
$_SESSION['login_user'] = $login;