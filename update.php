<?php

include_once("classes/Poll.php");
include_once("classes/Validation.php");

$poll = new Poll();
$validation = new Validation();

if(isset($_POST['Submit']))
{	
	$id = $poll->escape_string($_POST['id']);
	
	$poll_name = $poll->escape_string($_POST['poll_name']);
	$expire_date = $poll->escape_string($_POST['expire_date']);
	$msg = $validation->check_empty($_POST, array('poll_name', 'expire_date'));
	
	
	if($msg) {
		echo $msg;		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}else {	
		
		$result = $poll->execute("UPDATE polls SET poll_name='$poll_name',expire_date='$expire_date' WHERE id=$id");
		$poll_id = $id;
		$old_answer=count($_POST['answer_id']);
		if ($old_answer) {
			for ($i=0; $i < $old_answer; $i++) { 
				$answer=!empty($_POST['poll_answer'][$i])?$poll->escape_string($_POST['poll_answer'][$i]):'';
				$counter=!empty($_POST['counter'][$i])?$poll->escape_string($_POST['counter'][$i]):0;
				$color=!empty($_POST['color'][$i])?$poll->escape_string($_POST['color'][$i]):'';
				$sort_order=!empty($_POST['sort_order'][$i])?$poll->escape_string($_POST['sort_order'][$i]):0;
				$answer_id=$_POST['answer_id'][$i];
				$poll->execute("UPDATE poll_answers SET poll_id=$poll_id,answer='$answer',color='$color',sort_order=$sort_order where poll_id=$poll_id and id=$answer_id");
				//echo("Error description: " . $poll->error());
			}
		}
		$new_answer=count($_POST['poll_answer'])-$old_answer;
		if (!empty($new_answer)) {
				for ($i=$old_answer; $i<= $new_answer; $i++) { 
					$answer=isset($_POST['poll_answer'][$i])?$poll->escape_string($_POST['poll_answer'][$i]):'';
					//$counter=isset($_POST['counter'][$i])?$poll->escape_string($_POST['counter'][$i]):0;
					$color=isset($_POST['color'][$i])?$poll->escape_string($_POST['color'][$i]):'';
					$sort_order=isset($_POST['sort_order'][$i])?$poll->escape_string($_POST['sort_order'][$i]):0;
					$poll->execute("INSERT INTO poll_answers(poll_id,answer,color,sort_order) VALUES($poll_id,'$answer','$color',$sort_order)");
					//echo("Error description: " . $poll->error());
				}
			}
		header("Location: index.php");
	}
}
?>
