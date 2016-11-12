<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 19.08.16
 * Time: 20:35
 *
 * Class cuts and cleans the data passed to $_POST
 * return value is either string or number
 */

namespace libcontr\AuthController\Cleaner;


class Cleaner
{

    /*
     * return clean a positive number
     */
    public function clear_int($data)
    {
        $data =  abs((int)$data);
        return $data;
    }

    /*
     * returns a blank line cutting tags and spaces
     */
    public function clear_str($data)
    {
        $data = trim(strip_tags($data));
        return $data;
    }

}