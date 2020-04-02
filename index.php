<?php

include_once("classes/Poll.php");

$poll = new Poll();


$query = "SELECT * FROM polls ORDER BY id Asc";
$result = $poll->getData($query);

?>

<html>
<head>	
	<title>Homepage</title>
	<style type="text/css">
		.button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 12px;
		}
	</style>
</head>

<body>

<div style="border-style: ridge;width: 50%">
	<table width='100%' border=0 >
		<?php 
			foreach ($result as $key => $res) {
				echo "<tr><td><a href='edit.php?id=".$res['id']."'>Poll ".$res['id'].":,".$res['poll_name']."-Expires:".$res['expire_date']."</a></td></tr>";
			}
		?>
	</table>

	<a href="add.html" class="button">Add Poll</a><br/><br/>
</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  
</body>
</html>
