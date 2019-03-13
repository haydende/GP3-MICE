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

<h2>Current MICE members</h2>
<div align='center'>
<?php
	$tmpl = array ('table_open' => '<table class="mytable">');
	$this->table->set_template($tmpl); 
	
	$this->db->query('drop table if exists temp');
	$this->db->query('create temporary table temp as (SELECT m.Member_ID, t.Title, m.MemberName, m.Date_Join, s.Status 
					  FROM member m, title t, status s 
					  WHERE m.Title_ID = t.Title_ID AND m.Status_ID = s.Status_ID )');
	$query = $this->db->query('select * from temp;');
	echo $this->table->generate($query);
?>
</div>

<div align='center'>
	<button type="submit" onclick="location.href='<?php echo site_url('main/querynav')?>'">Back to queries</button>
</div>

</body>
</html>
