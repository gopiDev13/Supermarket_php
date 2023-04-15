<?php
include "../sidebar.php";
if(! isset($_SESSION["logged_in"])){
    header("location:../loginredirect.html");
}
?>
<style>
.center {
  border: 5px solid;
  margin-top: 200px;
  width: 50%;
  padding: 10px;
  display: flex;
  justify-content: center;
  /* margin-left: 400px; */
  margin-left: 400px !important;
}

        </style>


    <body>
<div class="center">

<?php

require_once('../dbconnection.php');
// print_r($_GET); 
if($_POST) {
	$id = $_POST['id'];
    
    $sql = "update users set status ='Inactive' where id = '$id'";
    if ($connect->query($sql) === TRUE) {
        // "
        echo "successfully deleted"."<br>".
        "<a href='adminmainpage.php'><button type='button'>Back</button></a>";
    } else {
        echo "Error deleting record : " . $connect->error;
    }

    $connect->close();

    

}
?>
</div>
</body>
</html>