<?php

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Istanbul');

$profilequery=$db->prepare("SELECT * FROM profile WHERE profile_id=?"); 
$profilequery->execute(array(0));
$getprofile=$profilequery->fetch(PDO::FETCH_ASSOC); 

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
                    <small>Profile</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li class="active">Profile</li>
                </ol>
            </section>

            <hr>

            <section class="content">
                <div class="container">


                    <form method="POST" action="netting/operation.php" class="form-horizontal col-lg-6" enctype="multipart/form-data">
                    <input type="hidden" name="profile_lastupdate" value="<?php echo date('Y-m-d H:i:s')  ?>">

                        <div class="col-lg-12" style="margin-bottom:15px;">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo $getprofile['profile_photo']; ?>" alt="User profile picture">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-8">
                                <input name="profile_photo" type="file" id="exampleInputFile">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-8">
                                <input name="profile_name" type="text" class="form-control" value="<?php echo $getprofile['profile_name']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Job</label>
                            <div class="col-sm-8">
                                <input name="profile_job" type="text" class="form-control" value="<?php echo $getprofile['profile_job']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">School</label>
                            <div class="col-sm-8">
                                <input name="profile_school" type="text" class="form-control" value="<?php echo $getprofile['profile_school']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Department</label>
                            <div class="col-sm-8">
                                <input name="profile_department" type="text" class="form-control" value="<?php echo $getprofile['profile_department']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Country</label>
                            <div class="col-sm-8">
                                <input name="profile_country" type="text" class="form-control" value="<?php echo $getprofile['profile_country']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">City</label>
                            <div class="col-sm-8">
                                <input name="profile_city" type="text" class="form-control" value="<?php echo $getprofile['profile_city']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Mail</label>
                            <div class="col-sm-8">
                                <input name="profile_mail" type="text" class="form-control" value="<?php echo $getprofile['profile_mail']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">About Me</label>
                            <div class="col-sm-8">
                                <textarea name="profile_aboutme" class="form-control" rows="3"><?php echo $getprofile['profile_aboutme']; ?></textarea>
                            </div>
                        </div>



                        <button type="submit" name="profileupdate" class="btn btn-primary pull-right">Update</button>

                    </form>

                    <div class="alert alert-<?php echo $type ?> alert-dismissible col-lg-5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-<?php echo $icon ?>"></i> <?php echo $message ?></h4>
                        <?php echo $text ?>
                    </div>

                    
                    <div class="alert alert-warning alert-dismissible col-lg-5">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> Warning!</h4>
                        Last Update is : <?php echo $getprofile['profile_lastupdate']; ?>
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