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

        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: 7px;
            right: 2px;
            position: relative;
            z-index: 2;
        }
    </style>
    <?php
    require_once('../dbconnection.php');
    include('../sidebar.php');
    if (!isset($_SESSION["logged_in"])) {
        header("location:../loginredirect.html");
    }


    $nameErr = $passErr  = $mailErr = $addressErr = "";

    if ($_POST) {





        if (empty(test_input($_POST["name"]))) {
            $nameErr = "please enter the name";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z' ']*$/", $name)) {
                $nameErr = "only letters allowed";
            }
            $name;
        }

        // $mobile_number = test_input($_POST["number"]);
        // if (!preg_match("/^[0-9' ']*$/", $mobile_number)) {
        //     $numberErr = "please enter numbers";
        // }
        // if (strlen($mobile_number) != 10) {
        //     $numberErr = "please enter within limits";
        // } else {
        //     $mobile_number;
        // }
        // $aadhar = test_input($_POST["aadhar"]);
        // if (!preg_match("/^[0-9' ']*$/", $aadhar)) {
        //     $aadharErr = "please enter numbers";
        // }
        // if (strlen($aadhar) != 12) {
        //     $aadharErr = "please enter within limits";
        // } else {
        //     $aadhar;
        // }
        $mail = test_input($_POST["email"]);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailErr = "please enter valid email";
            $mailErr;
        } else {
            $mail;
        }
        $address = $_POST["address"];
        if (empty($address)) {
            $addressErr = "please enter the address";
        } else {
            $address;
        }
        // $date = $_POST["date"];
        // if (empty($date)) {
        //     $dateErr = "please enter the date";
        //     print_r("hii");
        // } else {
        //     $date;
        // }


        $password = $_POST['password'];

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $numbers    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$numbers || !$specialChars || strlen($password) < 8) {
            $passErr = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else {
            $password;
        }


        // $sql_u = "SELECT * FROM emp_details WHERE number='$number'";
        $sql_e = "SELECT * FROM users WHERE email='$mail'";
        //  $res_u = mysqli_query($connect, $sql_u);
        $res_e = mysqli_query($connect, $sql_e);
        // print_r($res_u);



        //   if (mysqli_num_rows($res_u) > 0) {
        //      $numberErr = "Sorry number already taken";
        //  }       
        if (mysqli_num_rows($res_e) > 0) {
            $mailErr = "Sorry... email already taken";
        }

        if ($nameErr == "" && $mailErr == "" && $passErr == "" && $addressErr == "") {


            $passwords = mysqli_real_escape_string($connect, $password);

            $secure_pass = password_hash($passwords, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user_name,role_id,email,address,password,status) VALUES ('$name','1','$mail','$address','$secure_pass','Active')";
            if ($connect->query($sql) == TRUE) {
                // header("Location: message.html");
                echo "<script>
                Notify.suc('records inserted')
                setTimeout('Redirect()', 1000);
                function Redirect(){
                    window.location = '../owneradmin/adminmainpage.php';
                }</script>";;
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            $connect->close();
        } else {
            echo "<script>
            Notify.alert('invalid details')
            setTimeout('Redirect()',1000);
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
            <h3>Add Admin</h3>
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
                    <th>Mail</th>
                    <td><input type="text" name="email">
                        <span class="error"><?php echo $mailErr; ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        Password
                    </th>
                    <td><input type="password" name="password">
                     <!-- <i toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></i> -->
                     <span class="error"></span>
                    </td>
                </tr>
                <tr>
                    <th>
                        Confirm Password
                    </th>
                    <td><input type="password" name="pwd">
                        <span class="error><?php echo $cpassErr; ?>" </td>
                </tr>



                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="adminmainpage.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
    </form>

    <script>
        $(document).ready(function() {
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            $.validator.addMethod("passcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
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
                    // number: {
                    //     required: true,
                    //     number:true,
                    //     minlength: 3,
                    //     maxlength: 10
                    // },
                    address: {
                        required: true,
                    },
                    // aadhar:{
                    //     required:true,
                    //     number:true,
                    //     minlength:12,
                    //     maxlength:12,
                    // },
                    // date:{
                    //     required:true,
                    //     date:true,

                    // },
                    password: {
                        required: true,
                        passcheck: true,
                    },
                    pwd: {
                        required: true,
                        equalTo: '[name="password"]'
                    },

                    status: {
                        required: true,
                    }





                },

            });


$(".toggle-password").click(function() {
$(this).toggleClass("fa-eye fa-eye-slash");
var input = $(this).attr("toggle");
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});

        });
        
    </script>
</body>


</html>