<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	if (isset($_REQUEST['command']))
	{
		if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
			remove_product($_REQUEST['pid']);
		}
		else if($_REQUEST['command']=='clear'){
			unset($_SESSION['cart']);
		}
		else if($_REQUEST['command']=='update'){
			$max=count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				$pid=$_SESSION['cart'][$i]['productid'];
				$q=intval($_REQUEST['product'.$pid]);
				if($q>0 && $q<=999){
					$_SESSION['cart'][$i]['qty']=$q;
				}
				else{
					$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
				}
			}
		}
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
  <link rel="stylesheet" href="css/style.css" />

  <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
  <script src="assets/flex-slider/jquery.flexslider-min.js"></script>
  <script src="js/main.js"></script>
  <script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
</head>
<style>
	@media (max-width: 360px)
	{
		#carttable td:first-child {
			display:none;
		}
		#carttable tr:last-child td:first-child {
			display:block;
		}
	}
</style>
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
	
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; max-width:600px;" >
    <div style="padding-bottom:10px">
    	<h1 align="center">Your Shopping Cart</h1>
    <input type="button" value="Continue Shopping" onclick="window.location='products.php'" />
    </div>
    	<div style="color:#F00"><?php=$msg?></div>
    	<table id="carttable" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
    	<?php
			if(isset($_SESSION['cart'])){
            	echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Serial</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td><?=$i+1?></td><td><?=$pname?></td>
                    <td>$ <?=get_price($pid)?></td>
                    <td><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>                    
                    <td>$ <?=get_price($pid)*$q?></td>
                    <td><a href="javascript:del(<?=$pid?>)">Remove</a></td></tr>
            <?php					
				}
			?>
				<tr><td><b>Order Total: $<?=get_order_total()?></b></td><td colspan="5" align="right"><input type="button" value="Clear Cart" onclick="clear_cart()"><input type="button" value="Update Cart" onclick="update_cart()"><input type="button" value="Place Order" onclick="window.location='order.html'"></td></tr>
			<?php
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
			}
		?>
        </table>
    </div>
</form>
</body>
</html>