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



<h1>Queries</h1>
<div align='center'>
	<button type="submit" onclick="location.href='<?php echo site_url('main/querynav')?>'">Back to queries</button>
</div>



<h2>List of current MICE cinemas</h2>


<div align='center'
<body>
      <form method="POST" action = "<?php $_PHP_SELF ?>">
	  <br>
         <input type = "text" name = "cinemaname" placeholder = "Cinema Name" />
         <input type = "text" name = "cinema_location" placeholder = "Cinema Location" />
		 <input type = "text" name = "cinema_address" placeholder = "Cinema Address" />
		 <input type = "text" name = "cinema_manager" placeholder = "Cinema Manager" />
		 <input style="height:24px" type="submit" id = "submitbutton" name="submitbutton">
      </form>
	  <br>
</body> 

<?php
	if(isset($_POST['cinemaname']) || isset($_POST['cinema_location']) || isset($_POST['cinema_address']) || isset($_POST['cinema_manager'])){
	
	$cinema_name = "1";
	$cinema_location = "1";
	$cinema_address = "1";
	$cinema_manager = "1";
	
	if ($_POST['cinemaname'] != "") {
		$cinema_name = "Cinema_Name = \"" .$_POST['cinemaname']. "\"";
	}
	if ($_POST['cinema_location'] != "") {
		$cinema_location = "Cinema_Location = \"" .$_POST['cinema_location']. "\"";
	}
	if ($_POST['cinema_address'] != "") {
		$cinema_address = "Cinema_Address = \"" .$_POST['cinema_address']. "\"";
	}
	if ($_POST['cinema_manager'] != "") {
		$cinema_manager = "Cinema_Manager = \"" .$_POST['cinema_manager']. "\"";
	}
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	
	// create string containing SQL statement (used with following print for debugging)
	$sql_query = 'create temporary table temp as (SELECT Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager 
													  FROM cinema 
													  WHERE ' .$cinema_name. ' AND ' .$cinema_location. ' AND ' .$cinema_address. ' AND ' .$cinema_manager. ')';
	
	//print the SQL statement (for debugging)	  
	// print $sql_query;

	$this->db->query('create temporary table temp as (SELECT Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager 
													  FROM cinema 
													  WHERE ' .$cinema_name. ' AND ' .$cinema_location. ' AND ' .$cinema_address. ' AND ' .$cinema_manager. ')');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('SELECT Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager 
							   FROM temp');
	
	echo $this->table->generate($query);
	}   
	
	else{
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	$this->db->query('create temporary table temp as (select Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager FROM cinema)');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('select Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager from temp');
	
	echo $this->table->generate($query);
	}
	
?>
</div>

</body>
</html>
