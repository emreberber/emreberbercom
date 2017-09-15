<?php

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE); 
date_default_timezone_set('Europe/Istanbul');

$adminquery=$db->prepare("SELECT * FROM user WHERE user_id=?"); 
$adminquery->execute(array(0));
$getadmin=$adminquery->fetch(PDO::FETCH_ASSOC); 


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
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
                        <?php echo $getadmin['user_username']; ?>
                        <small>User</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li class="active">User</li>
                    </ol>
                </section>

                <hr>

                <section class="content">
                    <div class="container">

                        <form method="POST" action="netting/operation.php" class="form-horizontal col-lg-6">
                            <input type="hidden" name="user_lastupdate" value="<?php echo date('Y-m-d H:i:s')  ?>">



                            <div class="form-group">
                                <label class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="user_username" class="form-control" value="<?php echo $getadmin['user_username']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" disabled name="user_password" class="form-control" value="<?php echo $getadmin['user_password']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Mail</label>
                                <div class="col-sm-8">
                                    <input type="text" name="user_mail" class="form-control" value="<?php echo $getadmin['user_mail']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">IP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="user_ip" class="form-control" value="<?php echo $getadmin['user_ip']; ?>">
                                </div>
                            </div>



                            <button type="submit" name="userupdate" class="btn btn-primary pull-right">Update</button>

                        </form>


                        <div class="alert alert-<?php echo $type ?> alert-dismissible col-lg-5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-<?php echo $icon ?>"></i>
                                <?php echo $message ?>
                            </h4>
                            <?php echo $text ?>
                        </div>


                        <div class="alert alert-warning alert-dismissible col-lg-5">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Warning!</h4>
                            Last Update is :
                            <?php echo $getadmin['user_lastupdate']; ?>
                        </div>

                    </div>

                </section>


                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!--  <?php // include 'control-sidebar.php'; ?> -->

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </body>

    </html>