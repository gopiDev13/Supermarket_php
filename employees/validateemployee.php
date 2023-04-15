<?php 

session_start(); 
require_once '../dbconnection.php';


if($_POST['submit']) {
  print_r($_POST);
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

     if($userErr == "" && $passErr == ""){
      
       

        $sql = "SELECT * FROM emp_details WHERE emp_name='$uname'";

        $result = $connect->query($sql);
                
        if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
        

          
            $hash=$row['password'];
          

            if(password_verify($pass,$hash)){
             
            if ($row['emp_name'] == $uname) {
              
                $_SESSION['id'] = $row['id'];
                $_SESSION['role_id'] = $row['id'];
                $_SESSION["logged_in"] = true; 
                header("Location: employeedashboard.php");
            }else{
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