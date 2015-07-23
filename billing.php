<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	if(isset($_REQUEST['command']) && ($_REQUEST['command']=='update')){
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$result=mysql_query("insert into customers values('','$name','$email','$address','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}
		die('Thank You! your order has been placed!');
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cake shop</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/jquery-mobile/jquery.mobile.structure-1.3.1.css" />
  <link rel="stylesheet" href="css/font-awesome.css" />
  <link rel="stylesheet" href="assets/flex-slider/flexslider.css" type="text/css">
  <link rel="stylesheet" href="css/form.css" />

  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
  <script src="assets/flex-slider/jquery.flexslider-min.js"></script>
  <script src="js/main.js"></script>
  <script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
	}
</script>
</head>


<body>
<div id="main" data-role="page">
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
	<div id="content" data-role="content">
	
    <form name="form1" onsubmit="return validate()">
      <input type="hidden" name="command" />
	  <div align="center">
        <h1 align="center">Billing Info</h1>
        <table border="0" cellpadding="2px">
        	<tr><td>Order Total:</td><td><?php=get_order_total()?></td></tr>
            <tr><td>Your Name:</td><td><input type="text" name="name" /></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
            <tr><td>Email:</td><td><input type="text" name="email" /></td></tr>
            <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
        </table>
	  </div>
    </form>
</body>
</html>
