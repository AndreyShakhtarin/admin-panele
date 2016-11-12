<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 25.08.16
 * Time: 12:53
 */

$login = "user";
if(isset($_SESSION['create'])){
    $login = $_SESSION['create'];
    $login = $_SESSION['create'];
    $msg = 'created';
    $_SESSION['create'] = null;
}
if(isset($_SESSION['update'])){
    $login = $_SESSION['update'];
    $login = $_SESSION['update'];
    $msg = 'update';
    $_SESSION['update'] = null;
}
if(isset($_SESSION['remove'])){
    $msg = 'remove';
    $login = $_SESSION['remove'];
    $_SESSION['remove'] = null;
}



@$result = "<div class='reg'>
                <h1>Congratulations!</h1>
                <h3>You have $msg a $login!</h3>
                <a href='/?create' class='btn bg-primary button-reg'>Create User</a>
                <a href='/' class='btn bg-primary button-reg'>Back to Main Page</a>
          </div>";
 echo $result;
?>