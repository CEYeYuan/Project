<?php

class Model_users extends CI_Model{

	// DAVID ADDED THIS FUNCTION

	
	public function can_log_in(){
		$this->db->where('username',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query=$this->db->get('User');

		if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}
	}
	
	public function add_user(){
		$data=array(
			'username'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			
		);
		$query=$this->db->insert('User',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	


	public function query_profile(){



	$email = mysql_real_escape_string($this->session->userdata('email'));
			//$where = "username = '$email'";
	$queryResult = $this->db->query("select * from User where username='$email'");
	//echo $query->row()->DateofBirth;
	
	//set the initial value for gender
	return $queryResult;
	

	}


	public function query_fund(){
		$email = mysql_real_escape_string($this->session->userdata('email'));
			//$where = "username = '$email'";
		$queryResult = $this->db->query("select pname from User natural join Funder
			natural join Fund natural join Project  where username='$email';");

		return $queryResult;
	}

	public function query_init(){
		$email = mysql_real_escape_string($this->session->userdata('email'));
			//$where = "username = '$email'";
		$queryResult = $this->db->query("select pname from User natural join Initiator
			natural join InitiateProj natural join Project  where username='$email';");

		return $queryResult;

	}
}
