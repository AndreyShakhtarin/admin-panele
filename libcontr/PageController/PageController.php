<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 22.08.16
 * Time: 12:20
 *
 * The main class which redirects and finds pages by their importance.
 */

namespace libcontr\PageController;

use config\configConst\ConfigConst;

class PageController
{

    public $router;

    public $path;

    public $page;

    public $dir;

    const RESOURCE = 'libview/Resource/';

    /*
     * passed the array value from router to path
     */
    function __construct($router, $path)
    {
        $this->router = $router;
        $this->path   = $path;
     $this->dir = ConfigConst::DIR;
    }

    /*
     * checking equivalent value from prefix to path
     */
    private function eq_path($prefix)
    {
        foreach($this->path as $item=>$value){
            if($item == $prefix){
                return $value;
            }else{
                echo "<pre>";
                throw new \Exception('Not found path');
            }
        }
    }

    /*
     * checking equivalent value from prefix to router
     */
    private function eq_router($prefix)
    {
        foreach($this->router as $item=>$value){
            if($prefix == $item){
                return $value;
            }else{
                echo "<pre>";
                throw new \Exception('Not found router');
            }
        }
    }

    /*
     * checking equivalent value from prefix to server
     */
    private function eq_get($router)
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            $pattern = "/".$router."/";
            if(preg_match($pattern, $_SERVER['REQUEST_URI'])){
                return $router;
            }
            if(isset($_GET[$router])){
                return $router;
            }
        }
    }

    /*
     * returns a page by the value of the router's prefix and server
     */
    private function get_file($file){
        $full_path_file = $this->dir.self::RESOURCE.$file;
        if(file_exists($full_path_file)){
            include "$full_path_file";
        }else{
            echo "<pre>";
            throw new \Exception("Not found path to file: $full_path_file");
        }
    }

    /*
     * checking equivalent value from path, router, server
     */
    private function eq_routerANDget($path, $router, $ser)
    {
        if($router == $ser){
            $this->get_file($path);
        }else{
            echo "<pre>";
            throw new \Exception('Not equal $router and $ser ');
        }
    }

    /*
     * returns the page prefix
     */
    public function getPage($prefix)
    {
        $path   = $this->eq_path($prefix);
        $router = $this->eq_router($prefix);
        $get    = $this->eq_get($prefix);
        $this->eq_routerANDget($path, $router, $get);
    }

    /*
     * returns the page after authentication
     */
    public function getPageAdmin($prefix, $auth){
        if($auth){
            $path   = $this->eq_path($prefix);
            $router = $this->eq_router($prefix);
            $get    = $this->eq_get($prefix);
            $this->eq_routerANDget($path, $router, $get);
        }
    }
}