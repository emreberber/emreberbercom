<?php 

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE); // HATA GİZLEME 



$articlequery=$db->prepare("SELECT * FROM article order by article_id DESC  limit 25");
$articlequery->execute();
$count=$articlequery->rowCount();

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
                    Blog List
                    <small>
                        <?php

                        
                        if($_GET['delete']=='1') 
                        {
                        echo "<b style='color:green'>Deleting Successful</b>";
                        }
                        else if($_GET['delete']=='0')
                        {
                        echo "<b style='color:red'>Deleting Failed</b>";
                        }
                        
                        
                        ?>
                    </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li class="active">Blog List</li>
                </ol>
            </section>



            <section class="content">
                <div class="container">
                    <div class="col-lg-11">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h35 class="box-title">
                                            <?php echo $count.' articles'  ?>
                                            </h5>

                                            <div class="box-tools">
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <!--
                                                <input type="text" name="search_key" class="form-control pull-right" placeholder="Search">

                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default" name="search"><i class="fa fa-search"></i></button>
                                                </div>
                                                 -->
                                                </div>
                                            </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Status</th>

                                            </tr>

                                            <?php
                                            while($getarticle=$articlequery->fetch(PDO::FETCH_ASSOC))
                                            {  ?>



                                                <tr>
                                                    <td>
                                                        <?php echo $getarticle['article_id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $getarticle['article_title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $getarticle['article_category']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $getarticle['article_date']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="blog-edit.php?article_id=<?php echo $getarticle['article_id']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                        <a href="netting/operation.php?deletearticle=1&article_id=<?php echo $getarticle['article_id']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                        <?php
                                                    if($getarticle['article_status']=='1')
                                                    { ?>
                                                            <a href="netting/operation.php?articlestatus=1to0&article_id=<?php echo $getarticle['article_id']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></a>

                                                            <?php } else if($getarticle['article_status']=='0')
                                                    { ?>
                                                            <a href="netting/operation.php?articlestatus=0to1&article_id=<?php echo $getarticle['article_id']; ?>"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></a>

                                                            <?php } ?>




                                                    </td>

                                                </tr>

                                                <?php } ?>


                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
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