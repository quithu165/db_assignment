<?php
require_once('db_model.php');

class User
{
    private $username;
    private $userId;
    private $role;
    private $result = array();
}

class Category extends DbModel
{
    public function queryProductList($category)
    { {
            $conn = $this->connect();
            $sql = "SELECT 
                        name
                    FROM 
                        product JOIN category 
                    WHERE 
                        product.category_id = 3";
            $productList = "";
            if (!$res = mysqli_query($conn, $sql)) {
                return false;
            };
            
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $productList = $productList . '_' . $row["product..name"];
                    echo ($productList);
                }
            }
            return $productList;
        }
    }
}
