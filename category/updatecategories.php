<?php
    require_once('../dbconnection.php');
   
    include_once('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $statusErr = $desErr = "";

    if ($_POST) {

      $id = $_POST['id'];
       


        if (empty($_POST["name"])) {
            $nameErr = "please enter the name";
        } else {
            $name = ($_POST["name"]);
            if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
                $nameErr = "only letters allowed";
            }
            $name;
        }

        
        
        $desc = $_POST["des"];
        if (empty($desc)) {
            $desErr = "please enter the address";
            print_r($desc);
        } else {
            $desc;
        }
       
        
        $status = $_POST['status'];
        // if (empty($status)) {
        //     $statusErr = "please enter status";
        //     print_r("hii");
        // } else {
        //     $status;
        // }
       

        
        
       // $sql_u = "SELECT * FROM emp_details WHERE number='$number'";
       // $sql_e = "SELECT * FROM emp_details WHERE category_name ='$name'";
      //  $res_u = mysqli_query($connect, $sql_u);
       // $res_e = mysqli_query($connect, $sql_e);
       // print_r($res_u);

       
       
     //   if (mysqli_num_rows($res_u) > 0) {
     //      $numberErr = "Sorry number already taken";
      //  }       
        // if (mysqli_num_rows($res_e) > 0) {
        //     $mailErr = "Sorry...category already exits";
        // }

        if ($nameErr == "" && $statusErr == "" && $desErr == ""){
       
         $descrip = mysqli_real_escape_string($connect,$desc);


            $sql="update categories set category_name='$name',description='$descrip',status='$status' where id= {$id}";
            if ($connect->query($sql) == TRUE) {
                echo "<script>alert('records inserted')
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../category/categories.php';
                }</script>";
             
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            // $connect->close();
        } else {
            echo "<script>alert('Enter valid details')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../category/categories.php';
            }</script>";
        }
    }