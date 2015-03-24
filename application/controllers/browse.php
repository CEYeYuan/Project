<?php
class browse extends CI_Controller{ 
	public function index(){ 
		if ($this->session_userdata('is_logged_in')){
			$this->browse();
		}else{
			$this->load->view("pleaseLogin");
		}

	}


	public function browse($mar)





}


?>