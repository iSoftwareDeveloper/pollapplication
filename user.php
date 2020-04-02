<?php

include_once("classes/Poll.php");

$poll = new Poll();

$id = $poll->escape_string($_GET['id']);

$data = $poll->getPoll($id);

?>
<html>
<head>	
	<title>Edit Data</title>
	<style type="text/css">
		table {
		  border-collapse: collapse;
		  border: 1px solid black;
		}
	</style>
</head>

<body>
	<a href="index.php">Home</a>
	<form action="vote.php" method="post" name="form1" >
		<table cellpadding="10" border="0" id="polltable" width="25%">
			<tr><td><h3>Today's Poll</h3></td></tr>
			<?php foreach ($data['polls'] as  $poll) { ?>
				<tr><td><?php echo $poll['poll_name'];?></td></tr>
			<?php } ?>
			
			<?php foreach ($data['poll_answers'] as  $ans) { ?>
				<tr><td><input type="radio" name="radio" value="<?php echo $ans['id'];?>"><?php echo $ans['answer'];?></td></tr>
			<?php } ?>
			
			
			<tr> <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<td><input type="submit" name="Submit" value="Vote"></td>
			</tr>
		</table>
	</form>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</body>

</html>

