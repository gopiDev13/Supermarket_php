<?php
    require_once('../dbconnection.php');
    include_once('../sidebar.php');
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }

    $nameErr = $statusErr = $priceErr = $stockErr = $minErr ="";
    $cat_id = $_POST['category'];
    $id=$_POST['id'];
    if ($_POST) {

      
        // $cat_id = $_POST['category'];
        // $id=$_POST['id'];


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
       if ($nameErr == "" && $statusErr == "" && $minErr == "" && $stockErr == "" && $priceErr == "" ){
       
           


        $sql="update products set product_name='$name',sub_category_id='$cat_id',price='$price',stock='$stock',min_stock='$min_stock',status='$status' where id= {$id}";
            if ($connect->query($sql) == TRUE) {
                echo "<script>alert('records inserted')
                setTimeout('Redirect()', 0);
                function Redirect(){
                    window.location = '../products/products.php';
                }</script>";    print_r("hii");
            } else {
                echo "Error " . $sql . ' ' . $connect->connect_error;
            }

            // $connect->close();
        } else {
            echo "<script>alert('Enter valild details')
            setTimeout('Redirect()', 0);
            function Redirect(){
                window.location = '../products/products.php';
            }</script>";
        }
    }

