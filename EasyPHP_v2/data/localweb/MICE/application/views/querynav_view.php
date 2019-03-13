<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1 {text-align: center; font-family: Calibri;}
		
		select {
		width: 30%;
		padding: 16px 20px;
		border: solid;
		border-radius: 5px;
		background-color: #f1f1f1;
		text-indent: 5px;
		}
		
	</style>
</head>
<body>

<h1>Available system queries</h1>

<div align='center'>
	<select name='Queries'>
	  <option type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">List all current MICE cinemas</option>
	  <option type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">List all current MICE members</option>
	</select> 
</div> -->

</body>
</html>




<!--<div align='center'>
	<button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">List all current MICE cinemas</button> 
	<button type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">List all members</button>
</div> -->
	
	<!-- Existing code from provided orders system - Left for reference --> 
	<!-- <button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">Total customer orders</button> -->
	<!-- <button type="submit" onclick="location.href=' <?php echo site_url('main/query2')?>'">Ranked items by sales</button> -->


