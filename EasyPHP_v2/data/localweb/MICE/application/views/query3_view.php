<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
		h1, h2 { text-align: center; font-family: Calibri; }
		table.mytable {border-collapse: collapse;}
		table.mytable td, th {border: 1px solid grey; padding: 5px 15px 2px 7px;}
		th {background-color: #f2e4d5;}		
	</style>
</head>
<body>



<!-- <h1>Queries</h1> -->

<div align='center'>
	<button type="submit" onclick="location.href='<?php echo site_url('main/querynav')?>'">Back to queries</button>
</div>



<h2>List of current MICE-OFF festival performances</h2>


<div align='center'

<!-- INPUT FORMS TO TAKE USER INPUT TO BE USED IN DATABASE QUERIES -->
<body>
      <form method="POST" action = "<?php $_PHP_SELF ?>">
	  <br>
         <input type = "text" name = "cinema_name" placeholder = "Cinema Name" />
         <input type = "text" name = "film_name" placeholder = "Film Name" />
		 <input type = "text" name = "screen_number" placeholder = "Screen Number" />
		 <!--<input type = "text" name = "date" placeholder = "Performance Date" />-->
		 <input type="date" name="date" style="height:18px">
		 <input type = "text" name = "time" placeholder = "Performance Time" />
		 <input style="height:24px" type="submit" id = "submitbutton" name="submitbutton">
      </form>
	  <br>
</body> 

<style>
	table {
		foreground-color: #FFFFFF;
		background-color: #EEEEEE;
		text-align: center;
	}
	
	table th {
		background-color: #999999;
	}
</style>

<!-- DATABASE QUERY SECTION -->
<?php
	if(isset($_POST['cinema_name']) || isset($_POST['film_name']) || isset($_POST['screen_number']) || isset($_POST['date']) || isset($_POST['time']) || isset($_POST['seats']) ){
	
	$cinema_name = "1";
	$film_name = "1";
	$screen_number = "1";
	$date = "1";
	$time = "1";
	$seats = "1";
	
	// IF STATEMENTS TO CHECK IF FORMS HAVE BEEN FILLED BY USER AND SUBMITTED. 
	if ($_POST['cinema_name'] != "") {
		$cinema_name = "Cinema_Name LIKE '%" .$_POST['cinema_name']. "%'";
	}
	if ($_POST['film_name'] != "") {
		$film_name = "Title LIKE '%" .$_POST['film_name']. "%'";
	}
	if ($_POST['screen_number'] != "") {
		$screen_number = "Screen_ID = \"" .$_POST['screen_number']. "\"";
	}
	if ($_POST['date'] != "") {
		$date = "Date = \"" .$_POST['date']. "\"";
	}
	
	if ($_POST['time'] != "") {
		$time = "Time >= \"" .$_POST['time']. "\"";
	}
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('DROP TABLE IF EXISTS temp');
	
	//Create temporary table with specified field values
	$this->db->query('CREATE TEMPORARY TABLE temp AS (SELECT c.Cinema_Name AS \'Cinema\',
															 f.Title AS \'Film Title\', 
															 p.Screen_ID AS \'Screen Number\', 
															 p.Date, 
															 p.Time, 
															 p.Remaining_seats AS \'Seats remaining\' 
													  FROM performance p, film f, cinema c 
													  WHERE f.Film_ID = p.Film_ID AND 
														    c.Cinema_ID = p.Cinema_ID AND 
														    ' .$cinema_name. ' AND 
														    ' .$film_name. ' AND 
														    ' .$screen_number. 
														    ' AND ' .$date. ' AND '
														    .$time. ');');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('SELECT * FROM temp');
	
	echo $this->table->generate($query);
	}   
	
	
	// IF NONE OF THE FORM INPUT FIELDS HAVE BEEN SUBMITTED, DEFAULT TABLE IS DISPLAYED. 
	else{
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	$this->db->query('create temporary table temp as (select c.Cinema_Name AS \'Cinema\', 
															 f.Title AS \'Film Title\', 
															 p.Screen_ID AS \'Screen Number\', 
															 p.Date, 
															 p.Time, 
															 p.Remaining_seats AS \'Seats Remaining\'
													  FROM performance p, film f, cinema c 
													  WHERE f.Film_ID = p.Film_ID AND
															c.Cinema_ID = p.Cinema_ID)');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('select * from temp');
	
	echo $this->table->generate($query);
	}
	
?>
</div>

</body>
</html>
