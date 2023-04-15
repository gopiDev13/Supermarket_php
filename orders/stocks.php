<?php
include "../dbconnection.php";

if(isset($_POST['product_id']) && ($_POST['qty'])){

    $id=$_POST['product_id'];
    $sql="SELECT stock,min_stock from products where id='$id'";
    $result=$connect->query($sql);
    $row=$result->fetch_assoc();
    $quantity=$_POST['qty'];
    $dbstock=$row['stock'];
    $min_stock=$row['min_stock'];

    if($quantity >= $dbstock){
        $data=[
            'message'=>"Not enough stocks",
            'status'=>204,
        ];
        echo json_encode($data);
    }elseif($row['stock'] <= $min_stock){

        $data=[
            'message'=>"Please Order stocks",
            'status'=>205,
        ];
        echo json_encode($data);
    } 
    else{
   
        
        $data=[
            'message'=>"enough stocks",
            'status'=>200,
        ];
        // print_r($data);exit();
        echo json_encode($data);
    
    
    }

}

?>