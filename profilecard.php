<?php

include 'Admin/netting/connection.php';
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Europe/Istanbul');

$profilequery=$db->prepare("SELECT * FROM profile WHERE profile_id=?"); 
$profilequery->execute(array(0));
$getprofile=$profilequery->fetch(PDO::FETCH_ASSOC); 

$socialquery=$db->prepare("SELECT * FROM social WHERE social_id=?"); 
$socialquery->execute(array(0));
$getsocial=$socialquery->fetch(PDO::FETCH_ASSOC); 

?>

<!--Profile Card START -->
<div class="container">
        <div class="row">
            <div class="col l5 m8 s12 profile">
                <div class="col l12 m12 s12 profile-img">
                    <img src="img/profile.jpg" alt="Profile Photo">
                </div>
                <div class="col l12 m12 s12 profile-title" style="color:<?php echo $gethome['home_namecolor']; ?>">
                    <?php echo $getprofile['profile_name']; ?>
                </div>
                <div class="col l12 m12 s12 profile-who" style="color:<?php echo $gethome['home_jobcolor']; ?>">
                <?php echo $getprofile['profile_job']; ?>
                </div>
                <div class="col l12 m12 s12 profile-mail" style="color:<?php echo $gethome['home_mailcolor']; ?>">
                    Say Hello <i class="em <?php echo $gethome['home_mailicon']; ?>"></i> <?php echo $getprofile['profile_mail']; ?>
                </div>
                <div class="col l12 m12 s12 profile-text" style="color:<?php echo $gethome['home_aboutcolor'];?> ;">
                <?php echo $getprofile['profile_aboutme']; ?> 
                </div>
                <div class="col l12 m12 s12 profile-social" >
                    <a href="<?php echo $getsocial['social_twitter']; ?>" style="color:<?php echo $gethome['home_socialcolor']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="<?php echo $getsocial['social_github']; ?>" style="color:<?php echo $gethome['home_socialcolor']; ?>"><i class="fa fa-github" aria-hidden="true "></i></a>
                    <a href="<?php echo $getsocial['social_linkedin']; ?>" style="color:<?php echo $gethome['home_socialcolor']; ?>"><i class="fa fa-linkedin" aria-hidden="true "></i></a>
                    <a href="<?php echo $getsocial['social_codepen']; ?>" style="color:<?php echo $gethome['home_socialcolor']; ?>"><i class="fa fa-codepen" aria-hidden="true "></i></a>
                </div>
            </div>

            <div class="col l7 m12 s12 rightside">
                <div class="col l12 m12 s12 rightside-in valign-wrapper">
                <i class="fa fa-github hide-on-small-only" aria-hidden="true"></i> 
                <a href="#">Would you like to contribute to this project ?</a>          
                </div>
            </div>



        </div>
    </div>
    <!--Profile Card END -->