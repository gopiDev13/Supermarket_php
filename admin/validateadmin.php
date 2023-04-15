<?php 

session_start(); 
require_once '../dbconnection.php';


if($_POST['submit']) {
  
    $userErr=$passErr="";
    function validate($data){

        $data = trim($data);
 
        $data = stripslashes($data);
 
        $data = htmlspecialchars($data);
 
        return $data;
 
     }
    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

         $userErr="User Name is required";
         echo $userErr;

      }else if(empty($pass)){

        $passErr= "Password is required";
        echo $passErr;


    }

   //Sandygopi1320@  $secure_pass = password_hash($pass, PASSWORD_DEFAULT);
    if($userErr == "" && $passErr == ""){

        $sql = "SELECT * FROM users WHERE user_name='$uname'";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            $hash=$row['password'];

         if(password_verify($pass,$hash)){
            if ($row['user_name'] == $uname &&  $row['role_id'] == 1) {

                $_SESSION['id'] = $row['id'];
                $_SESSION['role_id'] = $row['role_id'];
                $_SESSION['logged_in']=true;
                header("Location: dashboard.php");

            

            }
        
            else{
                
                header("Location: ../error.html");
            }
        
        }

        else{
            header("Location: ../error.html");

                

            }

        

    }else{
        header("Location: ../error.html");
     }
   
}  
}
?>