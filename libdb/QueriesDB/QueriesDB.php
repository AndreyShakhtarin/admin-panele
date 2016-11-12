<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 23.08.16
 * Time: 10:20
 *
 *Requests and Response of the administrator.
 * Sorting the user table. Authentication super user, and more...
 */

namespace libdb\QueriesDB;

use libcontr\AuthController\ModifDate\ModifDate;

class QueriesDB
{

    private $connect;

    private $data;

    private $login;

    private $pass;

    public $date;

    /*
     * @param $connect - connection with database
     * @param $data - array value
     *
     */
    function __construct($connect, $data = null)
    {
        $this->connect = $connect;
        $this->data = $data;
    }

    /*
     * @param $admin - transferred to check with the similarity
     * with the username and password of administrator authentication.
     * if the username and password is in the database returns whether this user.
     */
    function getAdmin($admin)
    {
        if(!empty($admin)){
            foreach($admin as $item=>$value){
                if($item == "login"){
                    $this->login = $value;
                }if($item == "password"){
                    $this->pass = $value;
                }
            }
        }
        $sql = "SELECT login, password
                FROM admin_panel
                WHERE 1";


        $stmt = $this->connect->prepare($sql);
        if($stmt->execute(array($this->login))){
            $admindb = $stmt->fetch(\PDO::FETCH_ASSOC);
            if(($admindb['login'] == $this->login) && ($admindb['password'] == $this->pass)){
                return true;
            }return false;
        }
        return false;
    }

    /*
     * The recording you create a user in the database. Use the query preparatory by means of the PDO.
     *  Writes the session value of the result record.
     */
    function insertUser()
    {
        $sql= "INSERT INTO admin_panel (login, password, name, surname, date_birthday, gender)
        VALUES(:login, :password, :name, :surname, :birthday, :gender)";

        $login = $this->data['login'];
        $password = $this->data['password'];
        $name = $this->data['name'];
        $surname = $this->data['surname'];
        $birthday = $this->data['birthday'];
        $gender =  $this->data['gender'];

        $stmt = $this->connect->prepare($sql);;
        $stmt->bindParam(':login',    $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name',     $name);
        $stmt->bindParam(':surname',  $surname);
        $stmt->bindParam(':birthday', $birthday );
        $stmt->bindParam( 'gender',   $gender);

        $result = $this->getLogin($login);
        if($result){
            $stmt->execute();
            $_SESSION['create'] = $login;
            return true;
        }else{
            $_SESSION['no-create'] = $login;
            return false;
        }
    }

    /*
     * Check the existence of user in the database.
     * Used when creating a user or updating user data.
     * Returns the value of the user true if user was found,
     * false if user is not in the database.
     */
    function getLogin($login)
    {
        $sql = "SELECT login
                FROM admin_panel
                WHERE login = '$login'";
        $stmt = $this->connect->prepare($sql);
        if ($stmt->execute(array($login))) {
            $admindb = $stmt->fetch(\PDO::FETCH_LAZY);
            if($admindb['login'] == $login){
                return false;
            }else{
                return true;
            }
        }
    }

    /*
     * Updated data when editing a user. Before entry,
     * checks whether a user with a new username was in the database.
     * A session is created on the result of the action.
     */
    function updateUser()
    {
        $login = $this->data['login'];
        $password = $this->data['password'];
        $name = $this->data['name'];
        $surname = $this->data['surname'];
        $birthday = $this->data['birthday'];
        $gender =  $this->data['gender'];
        print_r($login);
        $sql= "UPDATE admin_panel SET password = :password,
                                      name = :name,
                                      surname = :surname,
                                      date_birthday = :birthday,
                                      gender = :gender
                                  WHERE login = :login";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':login',    $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':name',     $name);
        $stmt->bindParam(':surname',  $surname);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam( ':gender',  $gender);

        $result = $this->getLogin($login);
        if(!$result){
            if($stmt->execute()){
                $_SESSION['update'] = $login;
            }else{
                print_r($stmt->errorInfo());
            }
        }else{
            $_SESSION['no-update'] = $login;
        }
    }

    /*
     * @param $login - is passed to the query for getting user information
     */
    function getUser($login)
    {
        $sql = "SELECT login, password, name, surname, date_birthday, gender
                FROM admin_panel
                WHERE login = '$login'";

        $stmt = $this->connect->prepare($sql);
        if($stmt->execute(array('admin')));
        $users = $stmt->fetch(\PDO::FETCH_LAZY);
        $this->date = $users['date_birthday'];
        $this->getFormatDate();
        return $users;
    }

    /*
     * returns the total number of registered users
     */
    function getCount()
    {
        $sql = "SELECT COUNT(*)
                FROM admin_panel";

        $stmt = $this->connect->prepare($sql);
        if($stmt->execute(array('admin')));
        $users = $stmt->fetch(\PDO::FETCH_LAZY);
        return $users;
    }

    /*
     * sample user constraint for completing the table on the main page.
     */
    function getUsers($start, $end)
    {
        $sql = "SELECT login, name, surname, date_birthday
        FROM admin_panel
        LIMIT $start,$end";

        $stmt = $this->connect->prepare($sql);
        if($stmt->execute(array('admin')));
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    /*
     *verifies and removes the user if it exists in the database.
     *the results are stored in a session about the conducted actions
     */
    function removeUser($login)
    {

        $sql = "DELETE FROM admin_panel
                WHERE login = :login
                LIMIT 1";

        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':login', $login);
        $result = $this->getLogin($login);

        if(!$result){

            if($stmt->execute()){

                $_SESSION['remove'] = $login;
                return true;
            }else{
                print_r($stmt->errorInfo());
                return false;
            }
            $_SESSION['remove'] = $login;
            echo "Not Found User";
            return false;
        }

    }

    /*
     * Sorting and restriction of users when fetching from the database
     */
    function sort($sort, $desc = null, $start, $end)
    {

        $sql = "SELECT login, name, surname, date_birthday, gender
                FROM admin_panel
                ORDER BY $sort
                LIMIT $start, $end";
        $stmt = $this->connect->prepare($sql);
        if($stmt->execute()){
            $user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $user;
        }
    }

    /*
     * converts a date in a readable form
     * return date
     */
    function getFormatDate()
    {
        $date = date('d-m-Y', $this->date);
        return $date;
    }
}