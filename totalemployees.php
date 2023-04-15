<?php
require_once "dbconnection.php";
session_start();


$emp_id=$_SESSION['id'];
$sql="select count(id) as total_employees from emp_details where status ='Active'";

$result = $connect->query($sql);
$followingdata = $result->fetch_assoc();

$sql_u="select count(id) as total_products from products";
$details= $connect->query($sql_u);
$datas = $details->fetch_assoc();

$sql_r="select count(id) as total_admin from users where role_id='1'";
$totproducts=$connect->query($sql_r);
$products=$totproducts->fetch_assoc();
$sql_k="select count(id) as total_orders from orders where date=CURDATE()";
$totalorders=$connect->query($sql_k);
$orders=$totalorders->fetch_assoc();

$sql_o="select sum(od.price) as total_price from orders as o JOIN order_details as od ON o.id=od.order_id where date=CURDATE()"; 
$totalprice=$connect->query($sql_o);
$price=$totalprice->fetch_assoc();

$sql_f="select sum(total_price) as price from orders where date=CURDATE() and employee_id='$emp_id'"; 
$totalprices=$connect->query($sql_f);
$emp_price=$totalprices->fetch_assoc();


$sql="SELECT count(id) as Total from orders where employee_id='$emp_id' AND date=CURDATE()";
$result=$connect->query($sql);
$details=$result->fetch_assoc();
?>