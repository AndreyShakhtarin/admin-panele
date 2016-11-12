<?php
if(isset($server_uri[3])){
    $param = $server_uri[3];
    $sort_uri ='sort/'.$param.'/';
}else{
    $sort_uri = null;
}
$page_int = array();
for($i = 1; $i<=($count+15)/15; ++$i){
    echo "<a href='/?=table/$sort_uri$i'> $i </a>";
    $page_int[$i] = "$sort_uri/$i";
}