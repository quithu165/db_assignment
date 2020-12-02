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
            $sql = 'SELECT 
                        *
                    FROM 
                        product
                    ORDER BY product_id';
            $productList = "";
            if (!$res = mysqli_query($conn, $sql)) {
                echo "Can not query";
                return false;
            }
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    if (strpos($row['name'], $category) && strlen($category) <= strlen($row['name']))
                        $productList = $productList . '_' . $row["name"];
                    //echo ($productList);            }
                }
                return $productList;
            }
        }
    }
}
