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
			 <input type ="text" size="40" name="Performance_ID" placeholder = "Enter the performance number..."/> <br><br>
			 <input type ="text" size="40" name="Seats" placeholder = "Enter the number of seats..." /> <br><br>
			 <input type ="text" size="40" name="Member_ID" placeholder = "Enter your Member ID..."  /> <br><br>
			 <input style="height:24px; width:270px" type="submit" id = "submitbutton" name="submitbutton" value="Make Booking"> <br><br>
		  </form>
		  <br>
	</body>
	</div>



<br><br><br><br><br><br>
	<h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	    Available Performances</h2>

<div style="; float:left;  margin-left:300px" >
	<?php
		if (isset($_POST['Performance_ID']) && isset($_POST['Seats']) && isset($_POST['Member_ID'])) {
		
			$Performance_ID = $_POST['Performance_ID'];
			$Seats = $_POST['Seats'];
			$Member_ID = $_POST['Member_ID'];
			
			
			
			// create string containing SQL statement (used with following print for debugging)
			//$sql_query = 'create temporary table temp as (SELECT Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager 
															 // FROM cinema 
															//  WHERE ' .$cinema_name. ' AND ' .$cinema_location. ' AND ' .$cinema_address. ' AND ' .$cinema_manager. ')';
			
			//print the SQL statement (for debugging)	  
			// print $sql_query;

			$this->db->query('INSERT INTO Booking (No_seats, Member_ID, Performance_ID, Film_ID)
							  VALUES (' .$Seats. ', ' .$Member_ID. ', ' .$Performance_ID. ', (SELECT Film_ID 
																							  FROM Performance 
																							  WHERE Performance_ID = ' .$Performance_ID. '));');
			print "Your booking has been placed!";
							  
		} else {
			
			$tmpl = array ('table_open' => '<table class="mytable">');
			$this->table->set_template($tmpl); 
			
			// if a temp table currently exists, drop it so we can create a new one.
			$this->db->query('DROP TABLE IF EXISTS temp');
			
			//Create a temp table and specify required columns. 
			$this->db->query('CREATE TEMPORARY TABLE temp AS (SELECT p.Performance_ID AS \'#\', 
																	 c.Cinema_Name AS \'Cinema\',
																	 f.Title AS \'Film Title\', 
																	 p.Screen_ID AS \'Screen\', 
																	 p.Date AS \'Date\', 
																	 p.Time AS \'Time\',  
																	 p.Remaining_seats AS \'Seats Remaining\'
															  FROM performance p, film f, cinema c 
															  WHERE f.Film_ID = p.Film_ID AND 
																	c.Cinema_ID = p.Cinema_ID)
															  ORDER BY p.Date ASC, p.Time ASC');
			
			//Present all in the temp table with a SQL select all command. 
			$query = $this->db->query('select * from temp');
			
			echo $this->table->generate($query);
			
		}
	?>	
</div>

</html>
