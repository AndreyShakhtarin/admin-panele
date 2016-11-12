<?php
setcookie('PHPSESSID', null, time()-1, "/");
session_destroy();
$_SESSION = null;
header('Location: /');