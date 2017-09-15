<?php

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE); 
date_default_timezone_set('Europe/Istanbul');

$homequery=$db->prepare("SELECT * FROM home WHERE home_id=?"); 
$homequery->execute(array(0));
$gethome=$homequery->fetch(PDO::FETCH_ASSOC); 



// Message Box


$type="info";
$icon="info";
$message="Info !";
$text="You can edit the settings in this area";
if($_GET['update']=="1")
{
    $type="success";
    $icon="check";
    $message="Success !";
    $text="Update Successfull";
}
else if($_GET['update']=="0")
{
    $type="danger";
    $icon="times";
    $message="Danger !";
    $text="Update Failed";
}

// ./messagebox

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php include 'header.php'; ?>

        <!-- =============================================== -->

        <?php include 'sidebar.php'; ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Settings
                    <small>General</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li class="active">General</li>
                </ol>
            </section>

            <hr>

            <section class="content">
                <div class="container">
             
                    <form method="POST" action="netting/operation.php" class="form-horizontal col-lg-6" enctype="multipart/form-data">
                        <input type="hidden" name="home_lastupdate" value="<?php echo date('Y-m-d H:i:s')  ?>">


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Background Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_bgcolor" class="form-control" value="<?php echo $gethome['home_bgcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Navbar Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_navbarbgcolor" class="form-control" value="<?php echo $gethome['home_navbarbgcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Blog Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_blogcolor" class="form-control" value="<?php echo $gethome['home_blogcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Name Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_namecolor" class="form-control" value="<?php echo $gethome['home_namecolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Job Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_jobcolor" class="form-control" value="<?php echo $gethome['home_jobcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Mail icon</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_mailicon" class="form-control" value="<?php echo $gethome['home_mailicon']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Mail Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_mailcolor" class="form-control" value="<?php echo $gethome['home_mailcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">About color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_aboutcolor" class="form-control" value="<?php echo $gethome['home_aboutcolor']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Social Color</label>
                            <div class="col-sm-8">
                                <input type="text" name="home_socialcolor" class="form-control" value="<?php echo $gethome['home_socialcolor']; ?>">
                            </div>
                        </div>

                       

                        <button type="submit" name="homeupdate" class="btn btn-primary pull-right">Update</button>

                    </form>

 
                        <div class="alert alert-<?php echo $type ?> alert-dismissible col-lg-5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-<?php echo $icon ?>"></i> <?php echo $message ?></h4>
                            <?php echo $text ?>
                        </div>

                    
                    <div class="alert alert-warning alert-dismissible col-lg-5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Warning!</h4>
                        Last Update is : <?php echo $gethome['home_lastupdate']; ?>
                    </div>

                </div>

            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!--  <?php // include 'control-sidebar.php'; ?> -->


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar 
  <div class="control-sidebar-bg"></div>
-->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>