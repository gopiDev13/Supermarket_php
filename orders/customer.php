<?php

require_once('../dbconnection.php');


$nameErr  = $numberErr = $addressErr = "";

if (isset($_POST['cus_name']) && ($_POST['cus_num']) && ($_POST['cus_address'])) {

  $name=$_POST['cus_name'];
  $number=$_POST['cus_num'];
  $address=$_POST['cus_address'];
   


    if (empty(test_input($_POST['cus_name']))) {
        $nameErr = "please enter the name";
    } else {
        $name = test_input($_POST["cus_name"]);
        if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
            $nameErr = "only letters allowed";
        }
        $name;
    }

    $mobile_number = test_input($_POST["cus_num"]);
    if (!preg_match("/^[0-9' ']*$/", $mobile_number)) {
        $numberErr = "please enter numbers";
    }
    if (strlen($mobile_number) != 10) {
        $numberErr = "please enter within limits";
    } else {
        $mobile_number;
    }
   
    
    
   
    $sql_e = "SELECT * FROM customer WHERE number='$mobile_number'";

    $res_e = mysqli_query($connect, $sql_e);


   
   
 //   if (mysqli_num_rows($res_u) > 0) {
 //      $numberErr = "Sorry number already taken";
  //  }       
    if (mysqli_num_rows($res_e) > 0) {
        $numberErr = "Sorry Customer already exits";
    }

    if ($nameErr == "" && $numberErr == "" && $addressErr == "") {

   



        $sql = "INSERT INTO customer (customer_name,address,number,status) VALUES ('$name','$address','$mobile_number','Active')";
       
        if ($connect->query($sql) == TRUE) {
        //   include "cus.php";
          $id = $connect->insert_id;
        //   print_r($id);
          $sql_e="SELECT number,id from customer where id='$id'";
          $result=$connect->query($sql_e);
          $row=$result->fetch_assoc();
          $number= $row['number'];
          $id=$row['id'];
          echo "<div class='col-sm-4'>
          <select class='js-example-basic-single' name='customer'>
         <option value='$id'>$number</option></select>";
          
        } else {
            echo "Error " . $sql . ' ' . $connect->connect_error;
        }

        $connect->close();
    } else {
        echo "invalid details";

    }
}
function test_input($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;
}




?>