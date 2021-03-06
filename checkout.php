<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cake shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/jquery-mobile/jquery.mobile.structure-1.3.1.css" />
  <link rel="stylesheet" href="css/font-awesome.css" />
  <link rel="stylesheet" href="assets/flex-slider/flexslider.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" />

  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
  <script src="assets/flex-slider/jquery.flexslider-min.js"></script>
  <script src="js/main.js"></script>
  <script language="javascript">
</script>
</head>
<body>
<div data-role="page" data-theme="a">
    <!-- Side Navigation Panel -->
    <div data-role="panel" id="sideNav" data-position="left">
      <ul id="sideButtons">
        <li>
          <a href="#"><i class="icon-facebook"></i></a>
        </li>
        <li>
          <a href="#"><i class="icon-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="icon-linkedin"></i></a>
        </li>
          <li>
          <a href="#"><i class="icon-google-plus"></i></a>
        </li>
      </ul>
      <ul id="sidePanel" class="clleft">
        <li><a href="index.html"><i class="icon-home"></i> Home</a></li>
        <li><a href="about.html"><i class="icon-lightbulb"></i> About Us</a></li>
		<li><a href="products.html" rel="external"><i class="icon-shopping-cart"></i> Catalogue</a></li>
        <li id="active"><a href="products.php" rel="external"><i class="icon-star"></i> Order online</a></li>
        <li><a href="contact.html"><i class="icon-envelope"></i> Contact Us</a></li>
      </ul>
    </div>
    <!-- End Side Navigation -->
    <!-- Header -->
    <div data-role="header" data-position="fixed">
      <h1>Oulu Bakery</h1>
      <a href="#sideNav" id="navIcon"><i class="icon-th-list"></i></a>
	  <a href="#" data-icon="back" data-rel="back" class="roundbtn">Back</a>
    </div>
    <!-- End Header -->
    <!-- Content Start -->
    <div data-role="content">
		<h1>Thank you !</h1>
		<p>Your order has been successfully processed !</p>
		
	</div>
</body>
</html>