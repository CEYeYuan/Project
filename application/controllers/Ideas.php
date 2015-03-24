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
			$this->load->model('model_idea');
			if($result=$this->model_idea->query_byIid($Iid)){

				$data['Iid']=$Iid;
				$data['title']=$result->row()->title;
				$data['market']=$result->row()->market;
				$data['description']=$result->row()->description;
				$data['username']=$result->row()->username;
				$data['dateOfInit']=$result->row()->dateOfInit;

				$this->load->view("idea_view",$data);
			}else{
				echo "Error, please try again";
			}
		}else{
			$this->load->view('pleaseLogin');
		}
	}


}
?>