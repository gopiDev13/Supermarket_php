<?php
    require_once('../dbconnection.php');
    include('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $statusErr = $mailErr = $addressErr = "";

    if ($_POST) {

        $id=$_POST['id'];
        print_r("hii");


        if (empty(test_input($_POST["name"]))) {
            $nameErr = "please enter the name";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
                print_r("hii");
                $nameErr = "only letters allowed";
            }
            $name;
        }

       
        $mail = test_input($_POST["email"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            print_r("hii");
            $mailErr = "please enter valid email";
            $mailErr;
        } else {
            $mail;
        }
        $address = $_POST["address"];
        if (empty($address)) {
            print_r("hii");
            $addressErr = "please enter the address";
        } else {
            $address;
        }
       
        
        $status = $_POST['status'];
        if (empty($status)) {
            $statusErr = "please enter status";
            print_r("hii");
        } else {
            $status;
        }
      

        if ($nameErr == "" && $statusErr == "" && $mailErr == "" && $addressErr == "") {

       
             $email = mysqli_real_escape_string($connect,$mail);


          
             $sql="update users set user_name='$name',address='$address',email='$email',status='$status' where id= {$id}";
            if ($connect->query($sql) == TRUE) {
                // header("Location: message.html");
                echo "<script>
                Notify.suc('records inserted')
                setTimeout('Redirect()', 1000);
                function Redirect(){
                    window.location = '../owneradmin/adminmainpage.php';
                }</script>";
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            $connect->close();
        } else {
            echo "<script>
            Notify.alert('invalid details')
            setTimeout('Redirect()', 1000);
            function Redirect(){
                window.location = '../owneradmin/adminmainpage.php';
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