<?php
require_once "../dbconnection.php";
if(isset($_POST['package'])){
    $id=$_POST['package'];
    // print_r($id);

    $sql="SELECT price from products where id ='$id'";
    $rec = mysqli_query($connect,$sql);
    if (mysqli_num_rows($rec) > 0) {
        while ($res = mysqli_fetch_array($rec)) {
            echo $res['price'];
          //  print_r($res['price']);
        }
    }
}
die();
?>


?>