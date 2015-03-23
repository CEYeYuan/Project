<?php

class Model_idea extends CI_Model{

	public function add_idea(){
		return false;
		$data=array(
			'title'=>$this->input->post('title'),
			'market'=>$this->input->post('market'),
			''
	);
	
}
}
