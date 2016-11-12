<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 23.08.16
 * Time: 9:26
 *
 * Class authentication super user.
 * access to certain pages
 */

namespace libcontr\AuthController;

use libcontr\PageController\PageController;
use libdb\ConnectDB\ConnectDB;
use libdb\QueriesDB\QueriesDB;

class AuthController
{

    public $content;

    public $admin;

    /*
     * return page for user
     * @param $content - object PageController
     * @param $admin - data admin
     * @param $prefix - prefix for PageController
     */
    public function __construct( PageController $content, $admin = null, $prefix = null)
    {
        $this->content  = $content;
        $this->admin    = $admin;
        $this->prefix = $prefix;
        $this->getPage();

    }

    /*
     * Checks that user as a superuser for further medical treatment
     */
    function authAdmin()
    {
        $connect = new ConnectDB();
        $connect_db = $connect->connect();
        $query_admin = new QueriesDB($connect_db);
        $result = $query_admin->getAdmin($this->admin);
        $connect->destroy();
        return $result;
    }

    /*
     *return the  page table with users if passed of authentication
     */
    function getPage()
    {
            $result = $this->authAdmin();
            if($result){
                $this->content->getPage($this->prefix);
        }else{
            if(empty($this->admin)){
                if(empty($this->admin['login'])){
                    $this->content->getPage('auth');

                }

            }
        }
    }
}