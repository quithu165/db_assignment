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
                if (strpos($row['product_name'], $category) && strlen($category) <= strlen($row['product_name']))
                    $productList = $productList . '_' . $row["product_name"] . '_' . $row["product_id"];
                // echo ($productList);            
            }
        }
        if ($productList == "") return "_No suggestion found";
        else
            return $productList;
    }

    public function queryProduct($product)
    {
        $conn = $this->connect();
        // $sql = "SELECT 
        //                 *
        //             FROM 
        //                 product
        //             WHERE product_id = '$product'";
        $stmt = $conn->prepare("SELECT 
                                 *
                                FROM 
                                    online_shopping.product
                                WHERE product_id = ?");
        $stmt->bind_param("s", $producName);
        // if (!$res = mysqli_query($conn, $sql)) {
        //     echo "Can not query";
        //     return false;
        // }
        $producName = $product;
        $stmt->execute();
        $res = $stmt->get_result();
        $productInfo = "";
        if (mysqli_num_rows($res) > 0) {
            if ($row = mysqli_fetch_assoc($res)) {
                $productInfo = $row["product_id"] . '_' . $row["brand"] . '_' . $row["product_name"] . '_' . $row["product_model"] . '_' . $row["msrp"] . '_' . $row["availability"];
            }
        }

        return $productInfo;
    }

    public function queryProductBasedCategory($category)
    {
        if ($category == "") return "_No suggestion found";
        $conn = $this->connect();
        // $sql = "SELECT product_id FROM product NATURAL JOIN category WHERE category.category_name = '" . $category . "';";
        $productList = "";
        // if (!$res = mysqli_query($conn, $sql)) {
        //     echo "Can not query";
        //     return false;
        // }

        $stmt = $conn->prepare("SELECT product_id FROM product NATURAL JOIN category WHERE category.category_name = ?");
        $stmt->bind_param("s", $cateName);
        // if (!$res = mysqli_query($conn, $sql)) {
        //     echo "Can not query";
        //     return false;
        // }
        $cateName = $category;
        $stmt->execute();
        $res = $stmt->get_result();
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $productList = $productList . '_' . $row["product_id"];
                // echo ($productList);            
            }
        }
        if ($productList == "") return "_No suggestion found";
        else
            return $productList;
    }
}
