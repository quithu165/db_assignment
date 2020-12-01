<?php
require_once('db_model.php');

class User
{
    private $username;
    private $userId;
    private $role;
    private $result = array();
}

class UserModel extends DbModel
{
    public function login($username, $password)
    {
        if ($username == '' || $password == '') {
            return false;
        }
        $conn = $this->connect();
        $sql = 'SELECT 
                        * 
                    FROM 
                        user
                    WHERE 
                        username =  $username';
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            return $row;
        } else {
            return null;
        }
    }
}
