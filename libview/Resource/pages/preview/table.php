<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.08.16
 * Time: 1:57
 */
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;
use libcontr\PageController\NavigatorController;
$server_uri = explode('/', $_SERVER['REQUEST_URI']);

$db = new ConnectDB();
$connect = $db->connect();
$query = new QueriesDB($connect);
@$int = 1*$server_uri[2];
@$int2 = $server_uri[4]*1;

if(!($int == '0')) {
    $page = $server_uri[2];
    $end = $page * 15;
    $start = $end - 15;
}elseif(!($int2 == '0')){
    $page = $server_uri[4];
    $end = $page * 15;
    $start = $end - 15;
}else{
    $end = 15;
    $start = 0;
}

if(isset($server_uri[3])){
    $sort = $server_uri[3];
}else{
    $sort = 'name';
}
$users = $query->sort($sort, 'DESC', $start, $end);

$count = $query->getCount();
$count = $count['COUNT(*)'];

@$navigator = new NavigatorController($sort_uri, $count);

$back = $navigator->page_back();
$next = $navigator->page_next();

