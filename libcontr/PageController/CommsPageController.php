<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.08.16
 * Time: 12:21
 * The class that triggers the generation of pages.
 * In the class processed the data pages. Are the file paths,
 * identity page of a given router, and finding servers at the moment.
 * The server determines what html template to load on the page.
 */

namespace libcontr\PageController;

use libcontr\AuthController\AuthController;
use libcontr\AuthController\CheckController;

class CommsPageController
{

    private $auth;

    private $prefix = array();

    private $checking;


    function __construct($session, $prefix)
    {

        $this->session = $session;
        $this->prefix = $prefix;

        $checking = new CheckController($session);
        $this->checking = $checking->check();

    }

    /*
     *returns current page
     */
    function getCommsPage($server_request)
    {

        $req = $server_request;

        foreach($this->prefix as $item => $value){
                if(preg_match($item ,$req)){
                    $pattern = $item;
                    $prefix = $value;
                }
        }
        if(preg_match($pattern ,$req)){
            $admin = new PageController(array("$prefix" => "$prefix"), array("$prefix" => "pages/$prefix.php"));
            $auth = new AuthController($admin, $this->checking, "$prefix");
            $this->auth = $auth->authAdmin();
        }
        if(!$this->auth){
            $page_default = new PageController(array("auth" => ""), array("auth" => "pages/auth_admin.php"));
            $auth_default = new AuthController($page_default);
            $_SERVER['REQUEST_URI'] = '/';
        }

    }


}