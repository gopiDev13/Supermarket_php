<html>
    <head>
        <style>
.center {
  border: 5px solid;
  margin-top: 200px;
  width: 50%;
  padding: 10px;
  display: flex;
  justify-content: center;
  margin-top: 50px;
  margin-left: 400px;
  margin-left: 400px !important;
}

        </style>
    <?php 
    include "../sidebar.php";
    if(! isset($_SESSION["logged_in"])){
        header("location:../loginredirect.html");
    }
    ?>
    </head>

    <body>
<div class="center">

<?php
// include "sidebar.php";
require_once('../dbconnection.php');
// print_r($_GET); 
if($_POST) {
	$id = $_POST['id'];
    // echo print_r('id');exit();
    $sql = "update categories set status='Inactive' where id={$id}";
    if ($connect->query($sql) === TRUE) {
        // "
        echo "successfully deleted"."<br>".
        "<a href='categories.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error deleting record : " . $connect->error;
    }

    $connect->close();

    

}
?>
</div>
    </body>
</html>