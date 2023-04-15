<?php
include "../dbconnection.php";
$sql="select count(id) as total_employees from emp_details where status ='Active'";

                                    $result = $connect->query($sql);
                                    $followingdata = $result->fetch_assoc();
                                    $sql_u="select count(id) as total_products from products";
                                    $details= $connect->query($sql_u);
                                    $datas = $details->fetch_assoc();
                                    $sql_k="select count(id) as total_orders from orders where date=CURDATE()";
                                    $totalorders=$connect->query($sql_k);
                                    $orders=$totalorders->fetch_assoc();
                                    $sql_o="select sum(od.price) as total_price from orders as o JOIN order_details as od ON o.id=od.order_id where date=CURDATE()"; 
                                    $totalprice=$connect->query($sql_o);
                                    $price=$totalprice->fetch_assoc();
?>


