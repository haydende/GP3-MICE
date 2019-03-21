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

<h2>List of current MICE members</h2>
<div align='center'
<body>
      <form method="POST" action = "<?php $_PHP_SELF ?>">
	  <br>
         <input type = "text" name = "ID" placeholder = "Member ID" />
         <input type = "text" name = "title" placeholder = "Title" />
		 <input type = "text" name = "name" placeholder = "Name" />
		 <input type = "text" name = "join_date" placeholder = "Date Joined" />
		 <input type = "text" name = "status" placeholder = "Membership Status" />
		 <input style="height:24px" type="submit" id = "submitbutton" name="submitbutton">
      </form>
	  <br>
</body> 
<?php
if (isset($_POST['ID']) || isset($_POST['title']) || isset($_POST['name']) || isset($_POST['join_date']) || isset($_POST['status'])) {
	
	$memberID = "1";
	$title = "1";
	$name = "1";
	$join_date = "1";
	$status = "1";
	
	if ($_POST['ID'] != "") {
		$memberID = "m.Member_ID = \"" .$_POST['ID']. "\"";
	}
	if ($_POST['title'] != "") {
		$title = "t.Title = \"" .$_POST['title']. "\"";
	}
	if ($_POST['name'] != "") {
		$name = "m.MemberName = \"" .$_POST['name']. "\"";
	}
	if ($_POST['join_date'] != "") {
		$join_date = "m.Date_Join = \"" .$_POST['join_date']. "\"";
	}
	if ($_POST['status'] != "") {
		$status = "s.Status = \"" .$_POST['status']. "\"";
	}
	
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	// if a temp table currently exists, drop it so we can create a new one.
	$this->db->query('drop table if exists temp');
	
	//Create a temp table and specify required columns. 
	
	// create string containing SQL statement (used with following print for debugging)
	$sql_query = 'create temporary table temp as (SELECT m.Member_ID,
														 t.Title, 
														 m.MemberName, 
														 m.Date_join, 
														 s.Status 
												  FROM Member m, 
													   Status s, 
													   Title t 
												  WHERE ' .$memberID. ' AND '
													      .$title. ' AND ' 
													      .$name. ' AND ' 
													      .$join_date. ' AND ' 
													      .$status. 
														' AND m.Status_ID = s.Status_ID AND m.Title_ID = t.Title_ID)';
	
	//print the SQL statement (for debugging)	  
	// print $sql_query;

	$this->db->query($sql_query);
	
	//Present all in the temp table with a SQL select all command. 
	$query = $this->db->query('SELECT Member_ID AS \'ID\', Title AS \'Title\', 
									  MemberName AS \'Name\', Date_Join AS \'Date Joined\',
									  Status AS \'Status\' 
							   FROM temp');
	
	echo $this->table->generate($query);

} else {
	
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	$this->db->query('drop table if exists temp');
	$this->db->query('create temporary table temp as (SELECT m.Member_ID, t.Title, m.MemberName, m.Date_Join, s.Status 
													  FROM member m, title t, status s 
													  WHERE m.Title_ID = t.Title_ID AND m.Status_ID = s.Status_ID )');
	$query = $this->db->query('select * from temp;');
	echo $this->table->generate($query);
	
}
?>
</div>

</body>
</html>
