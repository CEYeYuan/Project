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
			$this->load->model('model_idea');
			if ($this->model_idea->query_others()===0){
				echo "We don't have any ideas posted yet, post your idea now!";
				$this->share_ideas();
			}elseif($result=$this->model_idea->query_others()){
				$data['result']=$result;
				$this->load->view('browse_view',$data);
			}else{
				echo "Error,Please try again!";
			}
			
		}else{
			$this->load->view("pleaseLogin");
		}
	}



	public function filter(){
		if($this->session->userdata('is_logged_in')){
			echo "fuck you!";
			$this->browseAll();

		}else{
			$this->load_view('pleaseLogin');
		}
	}
}


?>