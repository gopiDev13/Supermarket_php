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
}
    if($userErr == "" && $passErr == ""){

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] == $uname && $row['password'] == $pass && $row['role_id'] == 5) {
                $_SESSION["logged_in"] = true; 
                $_SESSION['id'] = $row['id'];
                $_SESSION['role_id']=$row['role_id'];
                header("Location: ownerdashboard.php");

              

            } else{
                header("Location: ../error.html");
            }
        }
        else{

            header("Location: ../error.html");

                

            }

        

    }
   


?>