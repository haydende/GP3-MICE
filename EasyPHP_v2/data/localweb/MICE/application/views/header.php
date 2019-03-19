<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
	#nav { font-family: Arial; font-size: 14px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;
		background-color: #5F6980}
		
	#nav {list-style: none; border:0;}
	#rightnav { list-style: none; }
	#nav li { float: left; }
	#rightnav li { float: right; }
	#nav li a { margin: 0 0 0 0; font-size: 15px; display: block; padding:14px 16px; text-decoration: none; color: #FFFFFF; background-color: #5F6980; border: 1px solid #5F6980;}
	#nav li a:hover {background-color: #354263;}
	#nav a:link, a:visited {border-radius: 0px 0px 0px 0px; }	
		
#container {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	padding-bottom: 50px;
	background-color: #D5D5D5;
	
	
}	
		
		
		
	</style>
</head>

<body>
	
	
	
	<div id="container">
		<ul id="nav" style="margin-bottom: 10px;">
		<li><a href='<?php echo site_url('')?>'>Home</a></li>
		<li><a href='<?php echo site_url('main/cinema')?>'>MICE-OFF Cinemas</a></li>
		<li><a href='<?php echo site_url('main/film')?>'>MICE-OFF Films</a></li>
		
		
		
			<ul id="rightnav">
			
			<li><a href='<?php echo site_url('main/login_view')?>'>Login</a></li>
			<li><a href='<?php echo site_url('main/querynav')?>'>System Information</a></li>
			<li><a href='<?php echo site_url('main/booking')?>'>Current Bookings</a></li>
			</ul>
		</ul>
	</div>
	
	
	<!--Original orders system code - Left for reference-->
	
	<!-- <li><a href='<?php echo site_url('main/items')?>'>Items</a></li> -->
	<!-- <li><a href='<?php echo site_url('main/customers')?>'>Customers</a></li> -->
	<!--<li><a href='<?php echo site_url('main/orderline')?>'>Order Line</a></li>-->
	<!--<li><a href='<?php echo site_url('main/blank')?>'>Blank Page</a></li>-->
	
	
</body>
</html>

