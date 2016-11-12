<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26.08.16
 * Time: 1:36
 * Navigator pages
 * creates navigation user's movement backward and forward in the user table
 */

namespace libcontr\PageController;


class NavigatorController
{

    public $sort_uri;

    public $count;

    /*
     * set params from server request,
     * and the number of user in database
     */
    function __construct($sort_uri, $count)
    {
        $this->sort_uri = $sort_uri;

        $this->count = $count;
    }

    /*
     * sortable pages for different circumstances of sampling and sorting users
     * returns the uri for the page
     */
    function sort_page(){

        $sort_uri = $this->sort_uri;
        $count = $this->count;
        $sort_uri = explode('/', $sort_uri);
        $sort = $sort_uri[0];
        if($sort_uri[0] == ''){
            $sort = '/?=table';
        }
        if(isset($sort_uri[1])){
            if(is_string($sort_uri[1])){
                $sort .= '/'.$sort_uri[1];
            }
        }
        for($j = 1; $j<=($count+15)/15; ++$j){
            $pages[$j] = "$sort/$j";
        }

        return $pages;
    }

    /*
     * go to the back page
     * return full uri with number page
     */
    function page_back()
    {
        $pages = $this->sort_page();
        $page_current = $this->sort_uri;
        if(!isset($page_current)){
            $page_back = 1;
        }if(isset($sort_uri[4])){
        $page_back = 1;
    }
        if($page_current > 1){
            $page_back = $page_current - 1;
        }
        @$back = $pages[$page_back];
        return $back;
    }

    /*
     * go to the next page
     * return full uri with number page
     */
    function page_next()
    {
        $pages = $this->sort_page();
        $page_current = $this->sort_uri;
        $end_page = (int)(($this->count+15)/15);
        if(!isset($page_current)){
            $page_next = 2;
        }if(!isset($sort_uri[4])){
        $page_next = 1;
    }

        if($page_current < $end_page){
            $page_next = 1;
            $page_next = $page_next + 1;
        }
        $next = $pages[$page_next];
        return $next;
    }
}