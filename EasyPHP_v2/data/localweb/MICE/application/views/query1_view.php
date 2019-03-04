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
<div align='center'>
<?php
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	$this->db->query('create temporary table temp as (select Cinema_ID, Cinema_Name, Cinema_Location, Cinema_Address, Cinema_Manager FROM cinema)');
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('select * from temp;');
	
	echo $this->table->generate($query);
?>
</div>
</body>
</html>
