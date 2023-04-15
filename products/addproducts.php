<html>

<head>
    <title>Add Products</title>

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
    $sql="select sub_category_name,id from sub_category where status='Active'";
    $all_categories = mysqli_query($connect,$sql);

    $nameErr = $statusErr = $priceErr = $stockErr = $minErr ="";

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
        $price = $_POST["price"];
        if (empty($price)) {
            $priceErr = "please enter the stock";
            
        } else {
            $price;
        }

        
        
        $stock = $_POST["stock"];
        if (empty($stock)) {
            $stockErr = "please enter the stock";
            
        } else {
            $stock;
        }
       
        $min_stock = $_POST["min_stock"];
        if (empty($min_stock)) {
            $minErr = "please enter the min stock";
            
        } else {
            $min_stock;
        }
       
        
        $status = $_POST['status'];
        // if (empty($status)) {
        //     $statusErr = "please enter status";
        //     print_r("hii");
        // } else {
        //     $status;
        // }
       if ($nameErr == "" && $minErr == "" && $stockErr == "" && $priceErr == "" ){
       
           


            $sql_insert = "INSERT INTO products (sub_category_id,product_name,price,stock,min_stock,status) VALUES ('$id','$name' ,'$price','$stock',' $min_stock','Active')";
            if ($connect->query($sql_insert) == TRUE) {
                echo "<script>alert('records inserted')
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../products/products.php';
                }</script>";
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            // $connect->close();
        } else {
            echo "<script>alert('enter valid details')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../products/products.php';
            }</script>";
        }
    }


    ?>
 
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">
        <div class="container" style="margin-left: 419px;margin-top: 150px;width: 20px;">
        <legend>Add Products</legend> <table class="table table-bordered">
                <tr>
                    <th>Product Name</th>
                    <td><input type="text" name="name"></td>
                    <span class="error"><?php echo $nameErr; ?></span>
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
                    <?php echo $category["sub_category_name"];
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
                    <th>Price</th>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <th>Stock</th>

                    <td><input type="number" name="stock">
                        <span class="error"><?php echo $stockErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Min Stock</th>

                    <td><input type="number" name="min_stock">
                        <span class="error"><?php echo $minErr; ?></span>
                    </td>
                </tr>
                  
             
                <tr>
                    <td><input type="submit" class="buttons" value="submit"></td>
                    <td><a href="products.php"><button type="button">Back</button></a></td>
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
                    
                  
                    price: {
                        required: true,
                        number:true,
                    },
                    stock: {
                        required: true,
                        number:true,
                    },
                  
                    min_stock: {
                        required: true,
                        number:true,
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
