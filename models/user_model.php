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
    public function login($username)
    {
        if ($username == '') {
            return false;
        }
        $conn = $this->connect();
        $sql = "SELECT 
                        * 
                    FROM 
                        user
                    WHERE 
                        username =  '$username'";
        if (!$res = mysqli_query($conn, $sql)) {
            echo "Can not query";
            return false;
        }
        if (mysqli_num_rows($res) > 0) {
            if ($row = mysqli_fetch_assoc($res)) {
                return $row['username'];
            }
        }

        return "#fails";
    }
}
