<?php

include 'netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Istanbul');

$profilequery=$db->prepare("SELECT * FROM profile WHERE profile_id=?"); 
$profilequery->execute(array(0));
$getprofile=$profilequery->fetch(PDO::FETCH_ASSOC); 

?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" style="height:2000px;">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $getprofile['profile_photo']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $getprofile['profile_name']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." autocomplete="off">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="admin.php"><i class="fa fa-lock"></i> <span>Admin</span></a></li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog"></i> <span>Settings</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="general.php"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="profile.php"><i class="fa fa-circle-o"></i> <span>Profile</span></a></li>
                <li><a href="social.php"><i class="fa fa-circle-o"></i> Social Media</a></li>
                <li><a href="api.php"><i class="fa fa-circle-o"></i> Api</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-pencil"></i> <span>Blog</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="blog.php"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li><a href="blog-list.php"><i class="fa fa-circle-o"></i> List</a></li>
            </ul>
        </li>

        <li><a href="home.php"><i class="fa fa-home"></i> <span>Home Page</span></a></li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-external-link"></i> <span>Others</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="http://fontawesome.io/icons/" target="_blank"><i class="fa fa-circle-o"></i>Font Awesome</a></li>
                <li><a href="https://afeld.github.io/emoji-css/" target="_blank"><i class="fa fa-circle-o"></i>Emoji CSS</a></li>
            </ul>
        </li>


        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>