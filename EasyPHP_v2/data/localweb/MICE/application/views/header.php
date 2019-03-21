<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
	
	#nav { font-family: Arial; font-size: 16px; width: 100%; float: left; margin: 0 0 1em 0; padding: 0; list-style: none;
		background-color: #5F6980}
		
	#nav {list-style: none; border:0;}
	#rightnav { list-style: none; }
	#nav li { float: left; }
	#rightnav li { float: right; }
	#nav li a { margin: 0 0 0 0; font-size: 15px; display: block; padding:14px 16px; text-decoration: none; color: #FFFFFF; background-color: #5F6980; border: 1px solid #5F6980; font-weight: bold}
	#nav li a:hover {background-color: #354263;}
	#nav a:link, a:visited {border-radius: 0px 0px 0px 0px; }	
	
	/* The dropdown container */
	.dropdown {
	  float: left;
	  overflow: hidden;
	}

	/* Dropdown button */
	.dropdown .dropbtn {
	   margin: margin: 0 0 0 0; font-size: 15px; display: block; padding:14px 16px; text-decoration: none; color: #FFFFFF; background-color: #5F6980; border: 1px solid #5F6980; font-weight: bold
	  }
	  

	/* Add a red background color to navbar links on hover */
	.navbar a:hover, .dropdown:hover .dropbtn {
	  background-color: #354263;;
	}

	/* Dropdown content (hidden by default) */
	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  border: 2px solid black;
	  z-index: 1;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
	  border: 2px solid black;
	  float: none;
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: center;
	  font-weight: bold
	}

	/* Add a grey background color to dropdown links on hover */
	.dropdown-content a:hover {
	  background-color: #ddd;
	}

	/* Show the dropdown menu on hover */
	.dropdown:hover .dropdown-content {
	  display: block;
	}	
		
	#container {
		width: 90%;
		margin-left: auto;
		margin-right: auto;
		padding-bottom: 50px;
		background-color: #D5D5D5;
		z-index: 100;
	}	
	
	</style>
</head>

<body>
	<div id="container">
		<ul id="nav" style="margin-bottom: 10px;">
		<li><a href='<?php echo site_url('')?>'>Home</a></li>
		
		<!-- FESTIVAL INFORMATION DROPDOWN TO BE USED BY MEMBERS -->
			<li><div class="dropdown">
				<button class="dropbtn">Member information 
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="<?php echo site_url('main/query1')?>">List festival cinemas</a>
					<a href="<?php echo site_url('main/query2')?>">Members List</a>
					<a href="<?php echo site_url('main/query3')?>">Festival Performances</a>
				</div> </div></li>
				
				<li><a href='<?php echo site_url('main/make_booking')?>'>Make a booking</a></li>
				
			<ul id="rightnav">
			<li><a href='<?php echo site_url('main/login_view')?>'>Login</a></li>
			
			<!-- ADD/EDIT DROPDOWN TO BE USED BY DIRECTOR -->
			<li><div class="dropdown">
				<button class="dropbtn">Add/Edit Information 
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="<?php echo site_url('main/cinema')?>">List festival cinemas</a>
					<a href="<?php echo site_url('main/film')?>">List festival films</a>
					<a href="<?php echo site_url('main/performances')?>">Performances</a>
				</div> </div></li>
			</ul>
		</ul>
	</div>	
</body>
</html>

