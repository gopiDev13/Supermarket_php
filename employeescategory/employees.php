

<title>Add Employess</title>

<body>
    
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
            margin-left: 400px !important;
            
            
        }
    

        table tr th {
            padding-top: 20px;
        }
        button {
           background-color: cornflowerblue;
        }
        .buttons {
           background-color: cornflowerblue;
        }
    </style>
    <?php
    require_once('../dbconnection.php');
    include_once('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $passErr = $dateErr = $mailErr = $addressErr = $aadharErr = $numberErr = "";

    if (isset($_POST['submit'])) {

      
       


        if (empty(test_input($_POST["name"]))) {
            $nameErr = "please enter the name";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
                $nameErr = "only letters allowed";
            }
            print_r($name);
        }

        $mobile_number = test_input($_POST["number"]);
        if (!preg_match("/^[0-9' ']*$/", $mobile_number)) {
            $numberErr = "please enter numbers";
        }
        if (strlen($mobile_number) != 10) {
            $numberErr = "please enter within limits";
        } else {
            print_r($mobile_number);
        }
        $aadhar = test_input($_POST["aadhar"]);
        if (!preg_match("/^[0-9' ']*$/", $aadhar)) {
            $aadharErr = "please enter numbers";
        }
        if (strlen($aadhar) != 12) {
            $aadharErr = "please enter within limits";
        } else {
            print_r($aadhar);
        }
        $mail = test_input($_POST["email"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "please enter valid email";
            $mailErr;
        } else {
           print_r($mail);
        }
        $address = $_POST["address"];
        if (empty($address)) {
            $addressErr = "please enter the address";
        } else {
           print_r($address);
        }
        $date = $_POST["date"];
        if (empty($date)) {
            $dateErr = "please enter the date";
            print_r("hii");
        } else {
            print_r($date);
        }
        
        // $status = $_POST['status'];
        // if (empty($status)) {
        //     $statusErr = "please enter status";
        //     print_r("hii");
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
            print_r($passErr);
        }else{
            print_r($password);
        }
        
        
       // $sql_u = "SELECT * FROM emp_details WHERE number='$number'";
        $sql_e = "SELECT * FROM emp_details WHERE email='$mail'";
      //  $res_u = mysqli_query($connect, $sql_u);
        $res_e = mysqli_query($connect, $sql_e);
       // print_r($res_u);

       
       
     //   if (mysqli_num_rows($res_u) > 0) {
     //      $numberErr = "Sorry number already taken";
      //  }       
        if (mysqli_num_rows($res_e) > 0) {
            $mailErr = "Sorry... email already taken";
            print_r("hii");
        }

        if ($nameErr == "" && $dateErr == "" && $mailErr == "" && $passErr == "" && $addressErr == "" && $aadharErr == "" &&  $numberErr == "") {

       
             $passwords = mysqli_real_escape_string($connect,$password);
             $hashedpass=password_hash($passwords,PASSWORD_DEFAULT);

            $sql = "INSERT INTO emp_details (emp_name,address,number,join_date,email,aadhar_number,password,status) VALUES ('$name', '$address','$mobile_number','$date', '$mail','$aadhar','$hashedpass','Active')";
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
            echo "<script>alert('records inserted')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../employeescategory/employees.php';
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

       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <legend>Add Employess</legend>
        <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>

                    <td><input type="text" name="address">
                        <span class="error"><?php echo $addressErr; ?></span>
                    </td>
                </tr>
               
              
              
                <tr>
                    <th>Contact</th>
                    <td><input type="text" name="number">
                        <span class="error"><?php echo $numberErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Joining Date</th>
                    <td><input type="date" name="date">
                <span class="error"><?php echo $dateErr; ?></span></td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td><input type="text" name="email">
                        <span class="error"><?php echo $mailErr; ?>
                    </td>
                </tr>
                <tr>
                    <th>Aadhar No</th>
                    <td><input type="text" name="aadhar">
                <span class="error"><?php echo $aadharErr; ?></span></td>
                </tr>
                <tr>
                    <th>
                        Password
                    </th>
                    <td><input type="password" name="password">
                <span class="error><?php  echo $passErr; ?>"</td>
                </tr>
                <tr>
                    <th>
                       Confirm Password
                    </th>
                    <td><input type="password" name="pwd">
                <span class="error><?php  echo $cpassErr; ?>"</td>
                </tr>
               
               
              
             
                <tr>
                    <td><input type="submit" class="buttons" name="submit" value="submit"></td>
                    <td><a href="mainemployees.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <script>
        $(document).ready(function() {
          jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            $.validator.addMethod("passcheck", function (value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    && /[a-z]/.test(value) // has a lowercase letter
                    && /\d/.test(value) // has a digit
            }, "please enter valid password");
            $(".form").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true,
                        minlength: 3
                    },
                    
                    email: {
                        required: true,
                        email: true
                    },
                    number: {
                        required: true,
                        number:true,
                        minlength: 3,
                        maxlength: 10
                    },
                    address: {
                        required: true,
                    },
                    aadhar:{
                        required:true,
                        number:true,
                        minlength:12,
                        maxlength:12,
                    },
                    date:{
                        required:true,
                        date:true,

                    },
                    password:{
                        required:true,
                        passcheck:true,
                    },
                    pwd: {
                        required: true,
                        equalTo: '[name="password"]'
                    },

                  
            
                   
                   


                },
                
            });



        });

     
        
    </script>
</body>
</head>

</html>