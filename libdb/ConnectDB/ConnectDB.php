<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 23.08.16
 * Time: 9:57
 *
 * connection with PDO to database
 */

namespace libdb\ConnectDB;

use config\configConst\ConfigConst;

class ConnectDB
{

    private $connect;

    private $driver;

    private $host;

    private $name;

    private $user;

    private $pass;

    /*
     * Takes configuration information database
     */
    function __construct()
    {
        $this->driver = ConfigConst::Driver;
        $this->host   = ConfigConst::Host;
        $this->name   = ConfigConst::Name;
        $this->user   = ConfigConst::User;
        $this->pass   = ConfigConst::Pass;
        $opt = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        );

        try{
            $this->connect = new \PDO($this->driver.":host=".$this->host.';dbname='.$this->name,$this->user,$this->pass, $opt);
        }catch(\PDOException $e){
            echo 'Not connection: ' . $e->getMessage();
        }

    }

    /*
     * return connection with database
     */
    function connect()
    {
        return $this->connect;
    }

    /*
     * destroy connection with database
     */
    function destroy()
    {
        $this->connect = null;
    }

}