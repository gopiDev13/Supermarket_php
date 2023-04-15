<?php

require_once '../dbconnection.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM emp_details WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();

    $connect->close();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style>
            .row {
               
                margin-right: 100px;
                margin-top: 50px;
                margin-bottom: 50px;
                margin-left: 400px !important;

                height: 200%;
                width: 200%;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <?php
        include "../sidebar.php";
        if(! isset($_SESSION["logged_in"])){
            header("location:../loginredirect.html");
        }
        ?>
        <form method="POST" action="deletemployees.php">
        <div class="row">

            <div class="col-lg-3 col-md-6">

                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <h1>Do you really want to delete !</h1>
                        <div class="row">

                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                           <a href="deletemployees.php"><input type="submit" value="yes"></a>
                            <a href="mainemployees.php"><button type="button">Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>
<?php
}
?>
