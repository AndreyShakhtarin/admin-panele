<?php
use libcontr\PageController\CommsPageController;
$pages = new CommsPageController($_SESSION, array(                          '//'    =>  'table',
    '/sort/'       =>  'table',
    '/show/'   =>  'show',
    '/edit/'   =>  'edit',
    '/remove/' =>  'remove',
    '/create/' =>  'create',
    '/success/'=>  'success'));
$pages->getCommsPage($_SERVER['REQUEST_URI']);