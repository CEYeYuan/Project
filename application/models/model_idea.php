<?php

class Model_idea extends CI_Model{

	public function add_idea(){
	
		$data=array(
			'title'=>$this->input->post('title'),
			'market'=>$this->input->post('market'),
			'username'=>$this->session->userdata('username'),
			'description'=>$this->input->post('description'),
			'market'=>$this->input->post('market'),
			'dateOfInit'=>date("Y-m-d H:i:s")
	);
		$query=$this->db->insert('Idea',$data);
		if ($query){
			return true;
		}
		else{
			return false;
		}
	}





}
