<?php
session_start();
if(!empty($_POST)){
    if(!isset($_SESSION['login'])){
        @$_SESSION['login'] = $_POST['login'];
        @$_SESSION['password'] =$_POST['password'];
        @$_SESSION['login_user'];
    }
}
use config\configConst\ConfigConst;
use libcontr\PageController\CommsPageController;

$bootstrap_css = ConfigConst::BOOTSTRAP_CSS;
$bootstrap_js = ConfigConst::BOOTSTRAP_JS;
$web = ConfigConst::WEB;
$bootstrap_jquery = ConfigConst::BOOTSTRAP_JQUERY;
$js = ConfigConst::JS;