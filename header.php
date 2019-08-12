<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php

require "vendor/autoload.php";

if (isset($_SESSION["storecart"])) {

    $cart = $_SESSION["storecart"];

    //unset($_SESSION["cart"]);
}

if (isset($_SESSION["feedback_msg"])) {
    $feedback_msg = $_SESSION["feedback_msg"];
    unset($_SESSION["feedback_msg"]);
}


if (isset($_SESSION["pop_login"])) {
    $pop_login = $_SESSION["pop_login"];
    unset($_SESSION["pop_login"]);
}

if (isset($_SESSION["pop_profile"])) {
    $pop_profile = $_SESSION["pop_profile"];
    unset($_SESSION["pop_profile"]);
}

if (isset($_SESSION["pleaselogin"])) {
    echo "<script type='text/javascript'>alert('Please Login, To be able to change passowrd')</script>";
    unset($_SESSION["pleaselogin"]);
}


if (isset($_SESSION["reg-success"])) {
    echo "<script type='text/javascript'>alert('Registration Successfull, Login to continue')</script>";

    unset($_SESSION["reg-success"]);
}

if (isset($_POST["logout"])) {
    echo "<script type='text/javascript'>alert('LogOut Successful')</script>";
    unset($_SESSION["logged"]);
    header("Location: .");
}

if (isset($_SESSION["signup-error"])) {
    $signup_error = $_SESSION["signup-error"];
    unset($_SESSION["signup-error"]);
}

if (isset($_POST["email"])) {

#echo phpinfo();
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $error = false;
    $error_msg;
    try {
        $m = new MongoDB\Client("mongodb://vinay0410:Qh4tPdg3!@ds123725.mlab.com:23725/pizza");
        $db = $m->pizza;
        $collection = $db->users;
    } catch (Exception $e) {
        #die("Caught Exception failed to Connect".$e->getMessage()."\n");

        $show_login = true;
        $error_msg = "Couldn't Connect to Database";
        $error = true;
    }
    if (!$error) {
        $result = $collection->findOne(['email' => $email], ['typeMap' => ['document' => 'array', 'root' => 'array']]);

        if (!empty($result)) {
            if ($result["password"] == $pass) {
                echo "<script type='text/javascript'>alert('Logged in Successfully');</script>";

                $_SESSION["logged"] = $result;
                if ($email == "admin@pizzavilla.com") {
                    header("Location: ./admin.php");
                } elseif(isset($result["role"])) {
                    header("Location: ./" . $result["role"] . ".php");
                }
            } else {
                $show_login = true;
                $error = true;
                $error_msg = "Passwords don't match";
            }
        } else {
            $show_login = true;
            $error_msg = "Email ID not Registered, Register First!\n";
            $error = true;
        }
    }
}

?>

	<meta charset="utf-8">

	<title>Pizza Villa</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="author" content="templatemo">


	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- css -->
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="css/comment.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- font-awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- custom -->
	<link rel="stylesheet" href="css/templatemo-style.css">


	<!-- google font -->
	<link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>






<style>
.front img{
height:200px;
}
.gallery-des{
color:white;
}
.back{
background-color:white;
border: 2px solid orange;
}
.front{
background-color:white;
}
</style>
<!--style for cart -->
 <style>



.my-cart-parent .glyphicon {
line-height:3;
}
  .badge-notify{
    background:orange;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: relative;
    z-index: 999;
  }


  </style>
<!-- ending style for cart -->


</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse">


	<!-- start navigation -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>
				<a href="<?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
    echo "#home";
} else {
    echo ".";
} ?>" class="navbar-brand smoothScroll"><strong>PIZZA Villa</strong></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    echo '#home';
} else {
    echo '.';
} ?>" class="smoothScroll">HOME</a></li>
					<li><a href="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    echo '#about';
} else {
    echo '.#about';
} ?>" class="smoothScroll">ABOUT</a></li>
					<li><a href="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    echo '#menu';
} else {
    echo '.#menu';
} ?>" class="smoothScroll">MENU</a></li>
					<li><a href="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    echo '#feedback';
} else {
    echo '.#feedback';
} ?>" class="smoothScroll">FEEDBACK</a></li>



					<?php if (!isset($_SESSION["logged"])) {
    ?>
					<li><a><button class="btn btn-warning pb-modalreglog-submit" data-toggle="modal" data-target="#myModal">Login</button><button class="btn btn-warning pb-modalreglog-submit" data-toggle="modal" data-target="#myModal2">Register</button></a></li>
        <?php
} else {
        ?>
          <li><a><button class="btn btn-warning pb-modalreglog-submit" data-toggle="modal" data-target="#userModal"><span class="glyphicon glyphicon-user"></span><?php echo ' Hi '.$_SESSION["logged"]["fname"]; ?></button></a></li>
          <?php if ($_SESSION["logged"]["email"] == "admin@pizzavilla.com") { ?>
            <li><a href="admin.php" class="btn">Admin</a></li>
        <?php  } elseif (isset($_SESSION["logged"]["role"])) { ?>
            <li><a href="<?php echo $_SESSION["logged"]["role"] . ".php"; ?>" class="btn"><?php echo $_SESSION["logged"]["role"]; ?></a></li>
        <?php  }
          ?>

          <li><a href="orderstatus.php" class="btn">Orders</a></li>
        <?php
    } ?>

        <li class="my-cart-parent">

        <span class="glyphicon glyphicon-shopping-cart my-cart-icon smoothScroll" style="cursor: pointer">Cart</span><span class="badge badge-notify my-cart-badge">0</span>
    </li>



      </ul>
      </div>
		</div>
	</div>
