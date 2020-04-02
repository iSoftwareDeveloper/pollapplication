<?php

include_once("classes/Poll.php");

$poll = new Poll();
$votes=0;
$data = $poll->getStatistics();
foreach ($data as $value) {
	$votes+=$value['votes'];
}

?>
<html>
<head>	
	<title>Statistics Data</title>
	<style type="text/css">
		table {
		  border-collapse: collapse;
		  border: 1px solid black;
		}
	</style>
</head>

<body>
	<a href="index.php">Home</a>
		<style>
        .border {
            width:300px;
            border:1px solid #DDDDDD;
        }

        .bar {
            height:30px;
            margin:10px 0px 10px 0px;
            
        }
	</style>

    <div class='border'>
    	<?php foreach ($data as $value) { 
    		$width=round(100*$value['votes']/$votes);
    		?>
    		<div class='bar' style='width:<?php echo $width;?>%;background-color:<?php echo $value['color'];?>;'></div><?php echo $width;?>%<div><?php echo $value['votes'];?></div>
    	<?php } ?>
    </div>
    <div>Total Votes Count <?php echo $votes; ?></div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</body>

</html>

