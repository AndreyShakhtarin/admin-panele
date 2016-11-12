<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 22.08.16
 * Time: 14:03
 *
 * Class Configuration Data.
 * This is Class for connect and data base configuration and the path to the key file.
 */

namespace config\configConst;


class ConfigConst
{
    //-----------------------------------------------------------------------------------//
    //--------------------Web File-------------------------------------//

    const DIR = __DIR__."/../../";
    const BOOTSTRAP_CSS = "/../../web/bootstrap/css/bootstrap.min.css";
    const BOOTSTRAP_JS  = "/../../web/bootstrap/js/bootstrap.min.js";
    const BOOTSTRAP_JQUERY = "/../../web/bootstrap/js/jquery.min.js";
    const WEB = "/../../web/";
    const FONT_AWESOME = "/../../web/font-awesme/css/font-awesome.min.css";
    const JS = "/../../web/js/main.js";

    //-----------------------------------------------------------------------------------//
    //-------------------------Data Database---------------------------------------------//

    const Driver = "mysql";
    const Host  = "localhost";
    const Name  = "admin_panel";
    const User  = "root";
    const Pass  = "123456";

}