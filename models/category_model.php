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
    { 
            if ($category == "") return "_No suggestion found";
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
                        $productList = $productList . '_' . $row["name"] . '_' . $row["product_id"];
                    // echo ($productList);            
                }
            }
            if ($productList=="") return "_No suggestion found";
            else
                return $productList;
        
    }

    public function queryProduct($product)
    { 
            $conn = $this->connect();
            $sql = "SELECT 
                        *
                    FROM 
                        product
                    WHERE product_id = '$product'";
            if (!$res = mysqli_query($conn, $sql)) {
                echo "Can not query";
                return false;
            }
            $productInfo = "";
            if (mysqli_num_rows($res) > 0) {
                if ($row = mysqli_fetch_assoc($res)) {    
                    $productInfo = $row["product_id"].'_'.$row["brand"].'_'.$row["name"].'_'.$row["model"].'_'.$row["price"].'_'.$row["availability"];      
                }
            }
          
                return $productInfo;
        
    }
}
