<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
 .test-navbar{
        display: unset !important;
        padding: 0 !important;
    }

        </style>
</head>

<body>

    <div id="wrapper">
    <?php 
                      session_start(); 
                      require_once "dbconnection.php"; 
                      $sess_id = $_SESSION['role_id']; 
                     
                     if($sess_id == 5){ ?>
                        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top test-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="nav.html">Home Page</a>
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
                        <li><a href="ownerprofile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="../loginredirect.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <?php   } else if($sess_id == 1) { ?>
                 <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top test-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../nav.html">Home Page</a>
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
                        <li><a href="adminprofile.php"><i class="fa fa-user fa-fw"></i>Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li><a href="../loginredirect.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <?php } ?>