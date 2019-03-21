<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<style>
	
		/*body css*/
        h1, h2 { text-align: center; font-family: Calibri; }
		table.mytable {border-collapse: collapse;}
		table.mytable td, th {border: 1px solid grey; padding: 5px 15px 2px 7px; align: center}
		th {background-color: #f2e4d5;}	

		
	</style>
</head>



<div style=" float:right;  margin-right:550px">
	<body>
		  <form method="POST" action = "<?php $_PHP_SELF ?>">
		  <br><br><br><br><br><br><br><br><br><br><br><br>
			<h4>Please input booking details</h4>
			 <input type ="text" size="25" name="cinema_name" placeholder = "Cinema Name" style="text-align: center; font-weight: bold"" /> <br><br>
			 <input type ="text" size="25" name="film_name" placeholder = "Film Name" style="text-align: center; font-weight: bold"" /> <br><br>
			 <input type ="text" size="25" name="screen_number" placeholder = "Screen Number" style="text-align: center; font-weight: bold"" /> <br><br>
			 <input type ="text" size="25" name="date" placeholder = "Performance Date" style="text-align: center; font-weight: bold" /> <br><br>
			 <input type ="text" size="25" name="time" placeholder = "Performance Time" style="text-align: center; font-weight: bold"" /> <br><br>
			 <input style="height:24px; width:207px" type="submit" id = "submitbutton" name="submitbutton" value="Make Booking"> <br><br>
		  </form>
		  <br>
	</body>
	</div>



<br><br><br><br><br><br>
	<h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	    Available Performances</h2>

<div style="; float:left;  margin-left:300px" >
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
		$cinema_name = "Cinema_Name = \"" .$_POST['cinema_name']. "\"";
	}
	if ($_POST['film_name'] != "") {
		$film_name = "Title = \"" .$_POST['film_name']. "\"";
	}
	if ($_POST['screen_number'] != "") {
		$screen_number = "Screen_ID = \"" .$_POST['screen_number']. "\"";
	}
	if ($_POST['date'] != "") {
		$date = "Date = \"" .$_POST['date']. "\"";
	}
	
	if ($_POST['time'] != "") {
		$time = "Time = \"" .$_POST['time']. "\"";
	}
	
	if ($_POST['seats'] != "") {
		$seats = "Remaining_seats = \"" .$_POST['seats']. "\"";
	}
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	
	// create string containing SQL statement (used with following print for debugging)
	//$sql_query = 'create temporary table temp as (SELECT Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager 
													 // FROM cinema 
													//  WHERE ' .$cinema_name. ' AND ' .$cinema_location. ' AND ' .$cinema_address. ' AND ' .$cinema_manager. ')';
	
	//print the SQL statement (for debugging)	  
	// print $sql_query;

	$this->db->query('create temporary table temp as (UPDATE c.Cinema_Name, f.Title AS \'Film Title\', p.Screen_ID AS \'Screen Number\', p.Date, p.Time, p.Remaining_seats 
													  FROM performance p, film f, cinema c 
													  WHERE f.Film_ID = p.Film_ID AND c.Cinema_ID = p.Cinema_ID AND ' .$cinema_name. ' AND ' .$film_name. ' AND ' .$screen_number. ' AND ' .$date. 
													  ' AND ' .$time. ' AND ' .$seats. ')');
	
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
	$this->db->query('create temporary table temp as (select c.Cinema_Name, f.Title AS \'Film Title\', p.Screen_ID AS \'Screen Number\', p.Date, p.Time,  
													  p.Remaining_seats FROM performance p, film f, cinema c WHERE f.Film_ID = p.Film_ID AND c.Cinema_ID = p.Cinema_ID)');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('select * from temp');
	
	echo $this->table->generate($query);
	}
	?>	
</div>

</html>
