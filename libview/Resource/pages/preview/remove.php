<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.08.16
 * Time: 1:59
 */
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;
if(isset($_SESSION['login_user'])){
    $login = $_SESSION['login_user'];
}
elseif(isset($_POST['login_user'])){
    $login = $_POST['login_user'];
}else{
    $login = "empty";
}

$db = new ConnectDB();
$connect = $db->connect();
$query = new QueriesDB($connect);
if(!empty($login) && $login !='empty'){
    $user = $query->getUser($login);
}else{
    $user['name'] = "empty";
}


$data_uer = explode("/", $_SERVER['REQUEST_URI']);
