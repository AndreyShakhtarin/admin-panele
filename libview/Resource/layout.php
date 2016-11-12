<?php
include 'pages/preview/layout.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $bootstrap_css;?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $web;?>css/layout.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top " role="navigation">
        <div class="container">
            <a class="navbar-brand btn bg-primary button-reg ml20" href="/?table">Admin Panel</a>
            <div class="navbar-header nav-menu">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <div class="col-sm-3 col-md-2 sidebar navbar-left bg">
                    <ul class="nav nav-sidebar">
                        <li class="text-center ht1"><label> Fast Sort</label></li>
                        <li ><a class="btn reg" href="/?table/sort/name">Name</a></li>
                        <li><a class="btn reg" href="/?table/sort/surname">Surname</a></li>
                        <li><a class="btn reg" href="/?table/sort/date_birthday">Date</a></li>
                    </ul>
                </div>
                <a  href="/?create" class="btn reg navbar-left ml40">Create user</a>
                <a type="submit" href="libview/Resource/pages/clean_post.php" class="btn button-reg navbar-right mr50">Exit</a>
            </div><!--/.navbar-collapse -->
        </div>
    </div>
    <!---Content users--->
<?php

    //echo "<div class=\"jumbotron ph mb0\">";

include "pages/preview/pages.php"

?>
    <!-- End Content users-->
</div> <!-- /container -->


<!-- Bootstrap core JavaScript-->
<script src="<?php echo $bootstrap_js;?>"></script>
<script src="<?php echo $bootstrap_jquery;?>"></script>
<script src="<?php echo $js;?>"></script>
<!--================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>