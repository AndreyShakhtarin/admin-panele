<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 23.08.16
 * Time: 13:43
 *
 * Cleaning data user adn admin
 */

namespace libcontr\AuthController;

use libcontr\AuthController\Cleaner\Cleaner;
use libcontr\AuthController\ModifDate\ModifDate;

class CheckController
{

    protected $post;

    /*
     * takes parameters passed by post
     */
    function __construct($post)
    {
        if(!empty($post)){
            $this->post = $post;
        }else{
            return;
        }

    }

    /*
     * check for authentication
     */
    public function check()
    {
        $clean = new Cleaner();
        $post = array();
        $post['login'] =  $clean->clear_str($this->post['login']);
        $post['password'] =  $clean->clear_str($this->post['password']);
        return $post;

    }

    /*
     * check for users
     */
    function check_create()
    {
        print_r($this->post);
        $clean = new Cleaner();
        $post['login'] = $clean->clear_str($this->post['login']);
        $post['password'] = $clean->clear_str($this->post['password']);
        $post['name'] = $clean->clear_str($this->post['name']);
        $post['surname'] = $clean->clear_str($this->post['surname']);
        $birthday = new ModifDate($this->post['day'], $this->post['month'], $this->post['year']);
        $datestamp = $birthday->get_datestamp();
        $post['birthday'] = $clean->clear_int($datestamp);
        $post['gender'] = $clean->clear_str($this->post['gender']);
        return $post;
    }


}