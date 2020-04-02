<?php

include_once("classes/Poll.php");

$poll = new Poll();


$id = $poll->escape_string($_GET['id']);

try {
	$response=$poll->execute("DELETE FROM poll_answers WHERE poll_id=$id");
	$response=$poll->execute("DELETE FROM polls WHERE id=$id");
} catch (Exception $e) {
	echo $e->getMessage();
}


if ($response) {
	
	header("Location:index.php");
}
?>

