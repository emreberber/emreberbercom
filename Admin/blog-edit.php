<?php 

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE); // HATA GİZLEME 
$articlequery=$db->prepare("SELECT * FROM article WHERE article_id=:article_id");
$articlequery->execute(array(
    'article_id' => $_GET['article_id']
    ));
  
$getarticle=$articlequery->fetch(PDO::FETCH_ASSOC);
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

  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <style>
    .row{
        margin-bottom:10px;
    }
    </style>
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
        Home Page
        <small>
         <?php

         
         if($_GET['update']=='1') 
         {
           echo "<b style='color:green'>Update Successful</b>";
         }
         else if($_GET['update']=='0')
         {
           echo "<b style='color:red'>Update Failed</b>";
         }
         
         
         ?>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>



    <section class="content">
    <div class="container">
       
    <form method="POST" action="netting/operation.php" class="form-horizontal col-lg-11">
    <input type="hidden" class="form-control"  value="<?php echo $getarticle['article_id']; ?>"  name="article_id">
               <div class="row">
                   
                  <label class="col-sm-1 control-label">Title</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $getarticle['article_title']; ?>"  name="article_title">
                  </div>
               

                
                  <label class="col-sm-1 control-label">Category</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $getarticle['article_category']; ?>" name="article_category">
                  </div>
              
                  </div>

                  <div class="row">
                  <label class="col-sm-1 control-label">Language</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $getarticle['article_language']; ?>" name="article_language">
                  </div>
              

           
                  <label class="col-sm-1 control-label">Keywords</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $getarticle['article_keywords']; ?>" name="article_keywords">
                  </div>
        
                  </div>

                  <div class="row">
         
                  <label class="col-sm-1 control-label">Author</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $getarticle['article_author']; ?>" name="article_author">
                  </div>

          
                  </div>
                

                <div class="row">
                    <textarea classs="ckeditor" id="editor1" name="article_content"><?php echo $getarticle['article_content']; ?></textarea>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                    </div>

                <button type="submit" class="btn btn-primary pull-right" name="updatearticle">Update</button>

            </form>
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
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>


</body>
</html>
