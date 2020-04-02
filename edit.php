<?php

include_once("classes/Poll.php");

$poll = new Poll();

$id = $poll->escape_string($_GET['id']);

$polls = $poll->getData("SELECT * FROM polls WHERE id=$id");
$poll_answers=$poll->getData("SELECT * FROM poll_answers WHERE poll_id=$id");

foreach ($polls as $res) {
	$poll_name = $res['poll_name'];
	$expire_date = $res['expire_date'];
	
}
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
	<br/><br/>
	
	<form action="update.php" method="post" name="form1" >
		<table cellpadding="10" border="0" id="polltable">
			<tr>
				
				<td colspan="2"><input type="text" name="poll_name" value="<?php echo $poll_name;?>"></td>
				<td></td>
				<td><input type="date" name="expire_date" value="<?php echo $expire_date; ?>"></td>
			</tr>
		    <?php foreach ($poll_answers as $res) { ?>

		    	<tr> 
					<td><input type="hidden" name="answer_id[]" value="<?php echo $res['id']; ?>"><input type="text" name="poll_answer[]" value="<?php echo $res['answer']; ?>" ></td>
					<td><input type="text" name="counter[]" value="<?php echo $res['counter']; ?>"></td>
					<td><input type="text" name="color[]" value="<?php echo $res['color']; ?>"></td>
					<td><input type="text" name="sort_order[]" value="<?php echo $res['sort_order']; ?>"></td>
				</tr>	
		    <?php } ?>
			
			<tr> 
				<td><input type="button" id="addanswer" value="+Add Answer"></td>
				<td><input type="submit" name="Submit" value="Save Poll"></td>
				<td><a class="button" href="delete.php?id=<?php echo $id;?>" onClick="return confirm('Are you sure you want to delete this poll?')">Delete Poll</a></td>
				<td></td>
			</tr>
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		</table>
	</form>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</body>
<script type="text/javascript">
	
	var x=1;
	$('#addanswer').on('click',function(){
		x++;
		html='<tr>'+ 
				'<td><input type="text" name="poll_answer[]" placeholder="Answer '+x+'"></td>'+
				'<td><input type="text" name="counter[]" placeholder="counter"></td>'+
				'<td><input type="text" name="color[]" placeholder="color"></td>'+
				'<td><input type="text" name="sort_order[]" placeholder="sort order"></td>'+
			'</tr>';
		$('#polltable tr:last').before(html);

	})
</script>
</html>

