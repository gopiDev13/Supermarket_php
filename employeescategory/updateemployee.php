<?php
    require_once('../dbconnection.php');
    require_once('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $passErr = $dateErr = $statusErr = $mailErr = $addressErr = $aadharErr = $numberErr = "";
    $id=$_POST['id'];
    if ($_POST) {

      
       


        if (empty(test_input($_POST["name"]))) {
            $nameErr = "please enter the name";
            echo $nameErr."<br>";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
                $nameErr = "only letters allowed";
                echo $nameErr."<br>";
            }
            
        }

        $mobile_number = test_input($_POST["number"]);
        if (!preg_match("/^[0-9' ']*$/", $mobile_number)) {
            $numberErr = "please enter numbers";
            echo $numberErr."<br>";
        }
        if (strlen($mobile_number) != 10) {
            $numberErr = "please enter within limits";
            echo $numberErr."<br>";
        } else {
            $mobile_number;
        }
        $aadhar = test_input($_POST["aadhar"]);
        if (!preg_match("/^[0-9' ']*$/", $aadhar)) {
            $aadharErr = "please enter numbers";
            echo $aadharErr."<br>";
        }
        if (strlen($aadhar) != 12) {
            $aadharErr = "please enter within limits";
            echo $aadharErr."<br>";
        } else {
            $aadhar;
        }
        $mail = test_input($_POST["email"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "please enter valid email";
             echo $mailErr ."<br>";
        } else {
            $mail;
        }
        $address = $_POST["address"];
        if (empty($address)) {
            $addressErr = "please enter the address";
            echo $addressErr ."<br>";
        } else {
            $address;
        }
        $date = $_POST["date"];
        if (empty($date)) {
            $dateErr = "please enter the date";
            echo $dateErr ."<br>";
            
        } else {
            $date;
        }
        
        $status = $_POST['status'];
        // if (empty($status)) {
        //     $statusErr = "please enter status";
        //     echo $statusErr ."<br>";
        // } else {
        //     $status;
        // }
        $password =$_POST['password'];

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $numbers    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$uppercase || !$lowercase || !$numbers || !$specialChars || strlen($password) < 8) {
            $passErr='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            echo $passErr ."<br>";
        }else{
            $password;
        }
        
        
       // $sql_u = "SELECT * FROM emp_details WHERE number='$number'";
       // $sql_e = "SELECT * FROM emp_details WHERE email = '$mail' and id NOT IN {'$id'}";
      //  $res_u = mysqli_query($connect, $sql_u);
       // $res_e = mysqli_query($connect, $sql_e);
       // print_r($res_u);

       
       
     //   if (mysqli_num_rows($res_u) > 0) {
     //      $numberErr = "Sorry number already taken";
      //  }       
        // if (mysqli_num_rows($res_e) > 0) {
        //     $mailErr = "Sorry... email already taken";
        //     echo $mailErr ."<br>";
        // }

        if ($nameErr == "" && $dateErr == "" && $statusErr == "" && $mailErr == ""&&  $addressErr == "" && $aadharErr == "" &&  $numberErr == "") {

            // $id=$_POST['id'];
             $passwords = mysqli_real_escape_string($connect,$password);


             $sql="update emp_details set emp_name='$name',address='$address',email='$mail',join_date='$date',aadhar_number='$aadhar',password='$passwords',number='$mobile_number',status='$status' where id= {$id}";
            if ($connect->query($sql) == TRUE) {
                echo "<script>alert('records inserted')
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../employeescategory/mainemployees.php';
                }</script>";
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            $connect->close();
        } else {
            echo "<script>alert('invalid details')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../employeescategory/mainemployees.php';
            }</script>";
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