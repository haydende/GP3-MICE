<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 {text-align: center; font-family: Calibri;}
		
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
		
		select {
		width: 30%;
		padding: 16px 20px;
		border: solid;
		border-radius: 5px;
		background-color: #f1f1f1;
		text-indent: 5px;
		}
		
/*container css*/
.container {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;
}
		
	</style>
</head>
<body>

<div id="container" style="background-color:#FFFFFF ">
	
<h1>Available system queries</h1>

<div align='center'>
	<select name='Queries'>
	  <option type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">List all current MICE cinemas</option>
	  <option type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">List all current MICE members</option>
	</select> 
</div>
	
</div>

</body>
</html>




<!--<div align='center'>
	<button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">List all current MICE cinemas</button> 
	<button type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">List all members</button>
</div> -->
	
	<!-- Existing code from provided orders system - Left for reference --> 
	<!-- <button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">Total customer orders</button> -->
	<!-- <button type="submit" onclick="location.href=' <?php echo site_url('main/query2')?>'">Ranked items by sales</button> -->


