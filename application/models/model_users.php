<?php

class Model_users extends CI_Model{

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
	
	

}
