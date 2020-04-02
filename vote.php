<?php

include_once("classes/Poll.php");
$poll = new Poll();

if(isset($_POST['Submit']))
{	
	

	$id = $poll->escape_string($_POST['id']);
	$vote_id = $poll->escape_string($_POST['radio']);
	if(empty($vote_id)) {
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else {	

		if (!isset($_COOKIE['has_voted'])) {
			$result = $poll->execute("UPDATE poll_answers SET counter = counter + 1 WHERE poll_id = $id and id=$vote_id");
			setcookie('has_voted', '1', mktime().time()+60*60*24*30);
			echo "<font color='green'>vote added successfully.";
			echo "<br/><a href='statistics.php'>View Result</a>";
		} else {
		   echo "<font color='green'>Vote Already Added.";
		}
		
	}
}
?>
