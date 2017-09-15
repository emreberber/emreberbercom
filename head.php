<?php

include 'Admin/netting/connection.php';
include 'Admin/function.php';

error_reporting(E_ALL ^ E_NOTICE); 
date_default_timezone_set('Europe/Istanbul');

$setquery=$db->prepare("SELECT * FROM setting WHERE set_id=?"); 
$setquery->execute(array(0));
$getset=$setquery->fetch(PDO::FETCH_ASSOC); 

$homequery=$db->prepare("SELECT * FROM home WHERE home_id=?"); 
$homequery->execute(array(0));
$gethome=$homequery->fetch(PDO::FETCH_ASSOC); 



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $getset['set_title']; ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="<?php echo $getset['set_description']; ?>">
    <meta name="keywords" content="<?php echo $getset['set_keywords']; ?>">
    <meta name="author" content="<?php echo $getset['set_author']; ?>">

    <!-- Progressive Web Apps -->
    <link rel="manifest" href="manifest.json">
    <!-- Icon -->
    <link rel="shortcut icon" href="Admin/<?php echo $getset['set_favicon']; ?>" type="image/x-icon">
    <link rel="icon" href="Admin/<?php echo $getset['set_favicon']; ?>" type="image/x-icon">
    <!-- Emoji CSS -->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--Font Awesome -->
    <script src="https://use.fontawesome.com/e94061c93b.js"></script>
    <!--Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Materialize Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    