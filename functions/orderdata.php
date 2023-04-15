<?php

function getCustomerName($id){
include "../dbconnection.php";
$sql= "SELECT customer_name from customer where id='$id'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();


// $totalorders=$connect->query($sql);
// $orders=$totalorders->fetch_assoc();
return $row['customer_name'];

 

}

function getEmployeeName($id){
    include "../dbconnection.php";
$sql= "SELECT emp_name from emp_details where id='$id'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();


// $totalorders=$connect->query($sql);
// $orders=$totalorders->fetch_assoc();
return $row['emp_name'];

}

function getAdminName($role_id){
    include "../dbconnection.php";
    $sql_r="SELECT role_name from role where id='$role_id'";
    $result=$connect->query($sql_r);
    $row=$result->fetch_assoc();
    return $row['role_name'];
}

function getCategoryName($category_id){
    
        include "../dbconnection.php";
      
        $sql="SELECT category_name from categories where id='$category_id'";
        $result=$connect->query($sql);
        $row=$result->fetch_assoc();
        return $row['category_name'];


    }

function getSubCategoryName($sub_category_id){
include "../dbconnection.php";
$sql="SELECT sub_category_name from sub_category where id='$sub_category_id'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();
return $row['sub_category_name'];

}

function getProductName($product_id){
include "../dbconnection.php";
$sql="SELECT product_name from products where id='$product_id'";
$result=$connect->query($sql);
$row=$result->fetch_assoc();
return $row['product_name'];

}



?>