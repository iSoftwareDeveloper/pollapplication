<html>
<head>
	<title>Add Poll Data</title>
</head>

<body>
<?php

include_once("classes/Poll.php");
include_once("classes/Validation.php");
$poll = new Poll();
$validation = new Validation();

if(isset($_POST['Submit'])) {	
	//echo '<pre>'; print_r($_POST); exit;
	$poll_name = $poll->escape_string($_POST['poll_name']);
	$expire_date = $poll->escape_string($_POST['expire_date']);
	$msg = $validation->check_empty($_POST, array('poll_name', 'expire_date'));
	
	if($msg != null) {
		echo $msg;		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else { 
		try {
			$poll->execute("INSERT INTO polls(poll_name,expire_date) VALUES('$poll_name','$expire_date')");
			$poll_id = $poll->insert_id();
			$ans=count($_POST['poll_answer']);
			if ($ans) {
				for ($i=0; $i < $ans; $i++) { 
					$answer=isset($_POST['poll_answer'][$i])?$poll->escape_string($_POST['poll_answer'][$i]):'';
					//$counter=isset($_POST['counter'][$i])?$poll->escape_string($_POST['counter'][$i]):0;
					$color=isset($_POST['color'][$i])?$poll->escape_string($_POST['color'][$i]):'';
					$sort_order=isset($_POST['sort_order'][$i])?$poll->escape_string($_POST['sort_order'][$i]):0;
					$poll->execute("INSERT INTO poll_answers(poll_id,answer,color,sort_order) VALUES($poll_id,'$answer','$color',$sort_order)");
					//echo("Error description: " . $poll->error());
				}
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
