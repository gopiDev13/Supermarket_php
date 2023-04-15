<?php
require_once "../dbconnection.php";
if(isset($_POST['Cpass']) && ($_POST['Pass']) &&($_POST['Cname']) && ($_POST['id'])){
    $id=$_POST['id'];
   

    $sql="SELECT password from emp_details where id ='$id'";
    $result=$connect->query($sql);
    $row=$result->fetch_assoc();
    // $current_password=$_POST['Cname'];
    // $curpass=password_hash($current_password,PASSWORD_BCRYPT);
    $hash=$row['password'];

   
  
    // print_r($curpass);

    if (password_verify($_POST['Cname'], $hash)){
  

    // if($current == $row['password']){
    $password=$_POST['Pass'];

    $secure_pass = password_hash($password, PASSWORD_DEFAULT);
   
    $sql_u="UPDATE emp_details set password ='$secure_pass' where id ='$id'";
    $result = $connect->query($sql_u);
    if ($result) {
        // header("Location: message.html");
        // return $data['status'] == 200;
       echo  "record inserted";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
} else {
    echo "invalid details";
}

    }

?>
