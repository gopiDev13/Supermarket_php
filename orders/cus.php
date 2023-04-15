<?php
require_once "../dbconnection.php";

//}


// include "dummy.php";

// $sql = "select id,emp_name from emp_details where status ='1'";
// $emp_details = mysqli_query($connect, $sql);
$sql_u = "select id,customer_name,number from customer";
$cus_details = mysqli_query($connect, $sql_u);
//$cus = mysqli_fetch_array($cus_details, MYSQLI_ASSOC);
$sql_r = "select id,product_name,price from products where status ='Active'";
$pro_details = mysqli_query($connect, $sql_r);


?>