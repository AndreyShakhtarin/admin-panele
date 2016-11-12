<?php
if(isset($_SESSION['create'])){
    $login = $_SESSION['create'];
    echo "Susscec!";
    $_SESSION['create'] = null;
}