<html>

<head>
    <title>Add Sub_categories</title>

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
    $sql="select category_name,id from categories";
    $all_categories = mysqli_query($connect,$sql);

    $nameErr =  $desErr = "";

    if ($_POST) {

      
        $id = $_POST['Category'];


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
       
        
      
       if ($nameErr == "" && $desErr == "" ){
       
           


            $sql_insert = "INSERT INTO sub_category (category_id,sub_category_name,description,status) VALUES ('$id','$name', '$desc','Active')";
            if ($connect->query($sql_insert) == TRUE) {
                echo "<script>alert('records inserted')
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../subcategory/sub_categories.php';
                }</script>";
               // print_r("hii");
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            // $connect->close();
        } else {
            echo "<script>alert('records inserted')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../subcategory/sub_categories.php';
            }</script>";
        }
    }


    ?>
 
        <legend>Add Sub Category</legend>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <legend>Add SubCategory</legend> <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Sub category name</th>
                    <td>
                        <select name="Category">
                        <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $category["id"]; ?>">
                    <?php echo $category["category_name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
                         
                        </select>
                        <span class="error"></span>
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
                    <td><a href="sub_categories.php"><button type="button">Back</button></a></td>
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
                        // lettersonly: true,
                        minlength: 3
                    },
                    
                  
                    des: {
                        required: true,
                    },
                  

                    status: {
                        required:true,
                    }
            
                   
                   


                },
                
            });



        });

     
        
    </script>
</body>
</head>

</html>
