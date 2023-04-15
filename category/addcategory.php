<html>

<head>
    <title>Add Employess</title>
    
</head>
<body>
   
   <!-- <style>
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
    </style> -->
    <?php
    require_once('../dbconnection.php');
    include_once('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $statusErr = $desErr = "";

    if ($_POST) {

      
       


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
       
        
        // $status = $_POST['status'];
        if (empty($status)) {
            $statusErr = "please enter status";
            print_r("hii");
        } else {
            $status;
        }
       

        
        
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

        if ($nameErr == "" && $desErr == "" ){
       
            // $descrip = mysqli_real_escape_string($connect,$desc);


            $sql = "INSERT INTO categories (category_name,description,status) VALUES ('$name', '$desc','Active')";
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
            echo "<script>alert('enter valid details')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../category/addcategories.php';
            }</script>";
        }
    }


    ?>
 
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
             <table class="table table-bordered">
                <h4>Add Category</h4>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>

                    <td><input type="text" name="des">
                        <span class="error"><?php echo $desErr; ?></span>
                    </td>
                </tr>
                 
              
             
                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="categories.php"><button type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <script>
        $(document).ready(function() {
          jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Letters only please");
            
            $(".form").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true,
                        minlength: 3
                    },
                    
                  
                    des: {
                        required: true,
                    },
                  

                    // status: {
                    //     required:true,
                    // }
            
                   
                   


                },
                
            });



        });

     
        
    </script>
</body>
</head>

</html>