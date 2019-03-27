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

<h2>List of all current festival films</h2>
<div align='center'
<body>
      <form method="POST" action = "<?php $_PHP_SELF ?>">
	  <br>
         <input type = "text" name = "film_name" placeholder = "Film Name" />
         <input type = "text" name = "director" placeholder = "Director Name" />
		 <input type = "text" name = "year_released" placeholder = "Year Released" />
		 <input style="height:24px" type="submit" id = "submitbutton" name="submitbutton">
      </form>
	  <br>
</body> 
<?php
if (isset($_POST['film_name']) || isset($_POST['director']) || isset($_POST['year'])) {
	
	$film_name = "1";
	$director = "1";
	$year_released = "1";
	
	if ($_POST['film_name'] != "") {
		$film_name = "Title LIKE '%" .$_POST['film_name']. "%'";
	}
	if ($_POST['director'] != "") {
		$director = "d.Name LIKE '%" .$_POST['director']. "%'";
	}
	if ($_POST['year_released'] != "") {
		$year_released = "Year_Release LIKE '%" .$_POST['year_released']. "%'";
	}

	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	
	// create string containing SQL statement (used with following print for debugging)
	$sql_query = 'create temporary table temp as (SELECT f.Title,
														 d.Name, 
														 f.Year_Release 
												  FROM film f, 
													   director d 
												  WHERE ' .$film_name. ' AND '
													      .$director. ' AND ' 
													      .$year_released.
														' AND d.Director_ID = f.Director_ID)';
	
	//print the SQL statement (for debugging)	  
	// print $sql_query;

	$this->db->query($sql_query);
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('SELECT Title AS \'Film Name\', Name AS \'Directors Name\', 
									  Year_Release AS \'Year of Release\'		 
							   FROM temp');
	
	echo $this->table->generate($query);

} else {
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	
	$this->table->set_template($tmpl); 
	
	$this->db->query('drop table if exists temp');
	
	$this->db->query('create temporary table temp as (SELECT f.Title,
														     d.Name, 
														     f.Year_Release 
													  FROM film f, director d
													  WHERE f.Director_ID = d.Director_ID)');
													  
		$query = $this->db->query('SELECT Title AS \'Film Name\', Name AS \'Directors Name\', 
									      Year_Release AS \'Year of Release\'		 
							       FROM temp');
								   
	echo $this->table->generate($query);
	
}
?>
</div>

</body>
</html>
