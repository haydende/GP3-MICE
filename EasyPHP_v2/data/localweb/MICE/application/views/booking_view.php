<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 { text-align: center; 	font-family: Calibri; }
		
/*body css*/
body {
	font-family: source-sans-pro;
	background-color: #f2f2f2;
	margin-top: 15px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	font-style: normal;
	font-weight: 200;
}	
		
		
		
/*container css*/
.container {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;
}
	</style>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>

<div id="container" style="background-color:#FFFFFF">
	<h1>Current Bookings</h1>
    	<div>
			<?php echo $output; ?>
   		 </div>
	</div>
</body>
</html>
