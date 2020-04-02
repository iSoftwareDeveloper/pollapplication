<?php
include_once 'Database.php';

class Poll extends Database
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
		
	public function execute($query) 
	{

		$result = $this->connection->query($query);
		
		if ($result == false) {
			
			return false;
		} else {
			return true;
		}		
	}
	public function insert_Id(){
		return $this->connection->insert_id;
	}
	public function error(){
		return $this->connection->error;
	}
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
	public function getPoll($poll_id){

		$query="select * from polls where id=$poll_id";
		$polls=$this->getData($query);
		$output=array();
		$output['polls']=$polls;
		// foreach ($polls as $res) { 
		// 	$output['polls'][] = $res;
		// }
		$query="SELECT * FROM poll_answers WHERE poll_id=$poll_id order by sort_order asc";
		$poll_answers=$this->getData($query);
		$output['poll_answers']=$poll_answers;
		// foreach ($poll_answers as $res) { 
		// 	$output['poll_answers'][] = $res;
		// }
		return $output;

	}
	public function getStatistics(){

		$query="SELECT color ,sum(counter) as votes FROM `poll_answers` GROUP by color order by votes desc";
		$data=$this->getData($query);
		return $data;

	}
}
?>
