<?php

if(isset($_SESSION['no-create'])){
    $login = $_SESSION['no-create'];
    echo "<div class='reg'>A user with this login $login was found!<br>
                                Keep a different login.
              </div>";
    $_SESSION['no-create'] = null;
}