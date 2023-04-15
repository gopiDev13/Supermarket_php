<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">




    <title>Bootstrap Table with Add and Delete Row Feature</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notyf/3.10.0/notyf.min.js" integrity="sha512-467grL09I/ffq86LVdwDzi86uaxuAhFZyjC99D6CC1vghMp1YAs+DqCgRvhEtZIKX+o9lR0F2bro6qniyeCMEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../library/alert-succss-confirm-notify-mobile/css/notify.css" />
    <script src="../library/alert-succss-confirm-notify-mobile/js/notify.js"></script>


    <title>Startmin - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
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
        .test {
            height: 100%;
            width: 240px;
        }
        .test-navbar{
        display: unset !important;
        padding: 0 !important;
    }
    </style>
    <div id="wrapper">


        <?php
        session_start();
        require_once "dbconnection.php";
        $sess_id = $_SESSION['role_id'];
        

        if ($sess_id == 5) { ?>
            <nav class="navbar navbar-inverse navbar-fixed-top test-navbar" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../owner/ownerdashboard.php">Home Page</a>
                </div>


                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">





                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Owner <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../owner/ownerprofile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                            </li>

                            <li class="divider"></li>
                            <li><a href="../loginredirect.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar test" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href='../owneradmin/adminmainpage.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Admins</a>
                            </li>
                            <li>
                                <a href='../employeescategory/mainemployees.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Employees</a>
                            </li>
                            <li>
                                <a href='../category/categories.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Categories</a>
                            </li>
                            <li>
                                <a href='../subcategory/sub_categories.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Sub Categories</a>
                            </li>
                            <li>
                                <a href='../products/products.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Products</a>
                            </li>


                            <li>
                                <a href='../orders/ordersview.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Orders</a>
                            </li>

                    </div>
                </div>
            <?php   } else if ($sess_id == 1) { ?>
                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top test-navbar" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../admin/dashboard.php">Home Page</a>
                    </div>


                    <ul class="nav navbar-nav navbar-left navbar-top-links">
                        <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                    </ul>

                    <ul class="nav navbar-right navbar-top-links">
                       <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="../admin/adminprofile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                                </li>

                                <li class="divider"></li>
                                <li><a href="../loginredirect.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-default sidebar test" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                    <li>
                        <a href='../employeescategory/mainemployees.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Employees</a>
                    </li>
                    <li>
                        <a href='../category/categories.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Categories</a>
                    </li>
                    <li>
                        <a href='../subcategory/sub_categories.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Sub Categories</a>
                    </li>
                    <li>
                        <a href='../products/products.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Products</a>
                    </li>
                    <li>
                        <a href='../orders/ordersview.php' style="width:240px;"><i class='fa fa-table fa-fw'></i>Orders</a>
                    </li>




    </div>
    </div>
<?php   } ?>

</nav>