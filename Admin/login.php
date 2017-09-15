<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="dist/css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>
            
            <div class="col-lg-12 login-form">
            <div class="col-lg-12 login-form">
            <form method="POST" action="netting/operation.php">
                <div class="form-group">
                    <label class="form-control-label">USERNAME</label>
                    <input type="text" name="user_username" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="form-control-label">PASSWORD</label>
                    <input type="password" name="user_passwords" class="form-control" i>
                </div>

                <div class="col-lg-12 loginbttm">
                    <div class="col-lg-8 login-btm login-text">
                        <?php
                        error_reporting(E_ALL ^ E_NOTICE);

                        if($_GET['login']=='exit')
                        {
                            echo "<p style='color:#22eaaa;'><i class='fa fa-thumbs-o-up' aria-hidden='true'></i> SUCCESSFUL EXIT</p>";
                        }
                        if($_GET['login']=='unauthorized')
                        {
                            echo "<p style='color:#e20049; '><i class='fa fa-ban' aria-hidden='true'></i> UNAUTHORIZED ENTRY</p>";
                        }
                        if($_GET['login']=='incorrect')
                        {
                            echo "<p style='color:#fc5185; '><i class='fa fa-thumbs-o-down' aria-hidden='true'></i> INCORRECT ENTRY</p>";
                        }
                        
                        ?>
                    </div>
                    <div class="col-lg-4 login-btm login-button">
                        <button type="submit" name="login" class="btn btn-outline-primary">LOGIN</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
    







<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
