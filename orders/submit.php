
<?php
require_once "../employees/sidebars.php";
require_once "../dbconnection.php";
session_start();
if (isset($_POST['submit'])) {

$customer_id = $_POST['customer'];

$employee_id=$_SESSION['id'];

$tot_price=$_POST['total'];

$product =$_POST['products'];

if($customer_id != ""){


$sql_p="INSERT INTO orders (customer_id,employee_id,date,total_price) VALUES ('$customer_id','$employee_id',NOW(),$tot_price)";

$result = mysqli_query($connect, $sql_p);




$product =$_POST['products'];
$order_id = $connect->insert_id;



foreach($product as $index => $ids){
$product_ids=$ids;
$discount_type=$_POST['discount'][$index]; 

$discount_value=$_POST['dis'][$index];

$quantity=$_POST['quantity'][$index];
$price=$_POST['totprice'][$index];
$tot_price=$_POST['total'];

if($product_ids != "" && $quantity != "" && $price != "" ){

    $sql_u="INSERT INTO order_details (order_id,product_id,discount_type,discount,quantity,price,tot_price) values
    ('$order_id','$product_ids','$discount_type','$discount_value','$quantity','$price','$tot_price')";
   
    $query_run = mysqli_query($connect, $sql_u);
   
    if($query_run)
    {
        echo "<script>
        Notify.suc('Successfully Completed');
        setTimeout('Redirect()',1000);
        function Redirect(){
            window.location = '../orders/orders.php';
        }</script>"; 
    }
    else
    {
       echo "error".$sql_u;
    }
}
else{
    echo "<script>Notify.alert('please fill all the fields');</script>";
}
}



foreach($product as $index => $ids){
   
    $product_ids=$ids;
   
    $quantity=$_POST['quantity'][$index];
    
    $sql="SELECT stock,min_stock from products where id='$product_ids'";
    
    $result = mysqli_query($connect, $sql);
    
    $pro = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if($pro['stock'] <= "20"){
        echo "<script>
        $.notify('Warning check stocks','warn');
        setTimeout('Redirect()', 10000);
        function Redirect(){
            window.location = '../orders/orders.php';
        }</script>";
        

    }
    else if($pro['stock'] != "0"){
    $qty=$pro['stock']-$quantity;
    $sql_r="update products set stock='$qty' where id= {$product_ids}";
    $res = mysqli_query($connect, $sql_r);
    if($res){
      
    }else{
        echo "Not updated";
    }

    }


}
}

else{
    echo "<script>
    Notify.alert('please fill all the fields');

    setTimeout('Redirect()',1000);
    function Redirect(){
        window.location = '../orders/orders.php';
    }</script>";
   
}
// Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Super_market_management\employees\sidebars.php:1) in C:\xampp\htdocs\Super_market_management\orders\orders.php on line 8
}
?>