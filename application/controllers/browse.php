<?php
class browse extends CI_Controller{ 
	public function index(){
		if ($this->session->userdata("is_logged_in")){
			$this->browseAll();
			
		}else{
			$this->load->view("pleaseLogin");
		}
	}
	

	public function browseAll(){	
		if ($this->session->userdata("is_logged_in")){
			$this->load->view('browse_view');
		}else{
			$this->load->view("pleaseLogin");
		}
	}
	




}


?>