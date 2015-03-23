<?php
class Ideas extends CI_Controller{
	public function index($Iid){
		if ($this->session->userdata("is_logged_in")){
			$this->loadView($Iid);
		}else{
			$this->load->view("pleasLogin");
		}
	}





	public function loadView($Iid){
		if ($this->session->userdata('is_logged_in')){
				$this->load->view('idea_view');
			$this->load->model('model_idea');
			if ($result=$this->model_idea->query_byIid($Iid)){
				$data['Iid']=$Iid;
				$data['title']=$result->title;
				$data['market']=$result->result()->market;
				$data['description']=$result->result()->description;
				$data['username']=$result->result()->username;
				$data['dateOfInit']=$result->result()->dateOfInit;

				$this->load->view("idea_view",$data);
				$this->load->view("idea_view");
			}else{
				echo "Error, please try again";
			}
			
		}else{
			$this->load->view('pleaseLogin');
		}
	}


}
?>