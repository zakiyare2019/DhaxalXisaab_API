<?php
class inheritance_class{
	public $db;
	public $result;
	public  $db_name="dhaxaldatabase"; 

		
	public function connection(){
		try{
			$this->db=new mysqli();
			$this->db->connect("localhost","root","");
			$this->db->select_db($this->db_name);
		}
		catch(Exception $ex){
			echo $ex.getMessage();
		}
	}
	 public function operation($qry){
	 	$this->connection();
	 	try{
	 		$ok=$this->db->query($qry);
			
	 			 	}
	 	catch(Exception $ex){
	 		echo $ex.getMessage();
	 	}
	 }
	public function operationReturn($qry){
		$this->connection();
		try{
		    $res[]="";
			$ok=$this->db->query($qry);
			
			while($row=$ok->fetch_assoc()){					
				$res[]=$row;
			}
			echo json_encode( $res);
		}
		catch(Exception $ex){
			echo $ex.getMessage();
		}
	}
	
	
	
	
}
?>