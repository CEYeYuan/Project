<?php
class Ideas extends CI_Controller{
	
	public function index($Iid){
		if ($this->session->userdata("is_logged_in")){
			$this->loadView($Iid);
		}else{
			$this->load->view("pleaseLogin");
		}
	}





	public function loadView($Iid){
		if ($this->session->userdata('is_logged_in')){
			$this->load->model('model_idea');
			if($result=$this->model_idea->query_byIid($Iid)){
				//$this->load->model('model_idea');
				$like=$this->model_idea->query_byIid_likes($Iid);
				//echo $like;
				$data['like']=$like;
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



	public function share(){
		
		if($this->session->userdata('is_logged_in')){
			$this->load->view('share_view');
		}else{
			$this->load->view('pleaseLogin');
		}

	}

	
	public function share_ideas(){
		if($this->session->userdata('is_logged_in')){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('title','Email','
			required|trim|xss_clean|callback_validate_credientials');
			$this->form_validation->set_rules('title','Title','required|trim|xss_clean');
			$this->form_validation->set_rules('description','Description','required|trim|xss_clean');
			if ($this->form_validation->run()){
				$this->load->model('model_idea');

				if ($this->model_idea->add_idea()===true){
					//echo "success!";	
					$this->latestIdea();
				}	else{
					echo "Problem adding to database";
					$this->load->view('share_view');
				}
			}else{
				$this->load->view('share_view');
			}
		}

		else{
			$this->load->view('pleaseLogin');
		}
	}


	public function myIdeas(){
		if ($this->session->userdata('is_logged_in')){
			$this->load->model('model_idea');
			if($this->model_idea->query_myIdea()===0){
				echo "You don't have any ideas posted yet, post your idea now!";
				$this->share_ideas();
			}
			elseif($this->model_idea->query_myIdea()){
			
				$data['result']=$this->model_idea->query_myIdea();
				$this->load->view('myIdeas_view',$data);
				
			}else{
				echo "database error";
			}
		
		
		}
		else{
			$this->load->view('pleaseLogin');
		}
	}


	public function latestIdea(){
		if ($this->session->userdata('is_logged_in')){
			$this->load->model('model_idea');

	
			if($Iid=$this->model_idea->latest_Iid()){
				echo $Iid;
				redirect(base_url()."index.php/Ideas/index/$Iid");
				//$this->load->view('myIdeas_view');
			}else{
				echo "error, please try again!";
			}

		}else{
			$this->load->view('pleaseLogin');
		}
	}


	public function edit($Iid){
		if($this->session->userdata('is_logged_in')){
			$this->load->model("model_idea");
			$result=$this->model_idea->edit($Iid);
			if ($result===false){
				echo "You're not allowed to edit others' Idea !";
				$this->load->view('home_view');		
			}elseif($result->num_rows()>=1){
				$data['result']=$result;
				$this->load->view('edit_view',$data);
			}else{
				echo "database error!";
			}

		}else{
			$this->load_view('pleaseLogin');
		}
	}

	public function delete($Iid){
		if($this->session->userdata('is_logged_in')){
			$this->load->model("model_idea");
			$result=$this->model_idea->delete($Iid);
			if ($result===false){
				echo "You're not allowed to delete others' Idea !";
				$this->load->view('home_view');		
			}elseif($result===1){
				echo "delete successfully!";
				$this->load->view('home_view');
			}else{
				echo "database error!";
			}

		}else{
			$this->load_view('pleaseLogin');
		}
	}


	public function like($Iid){
		if($this->session->userdata('is_logged_in')){
			$this->load->model("model_idea");
			$result=$this->model_idea->like($Iid);
			if ($result===false){
				echo "You're not allowed to like your own Idea !";
				$this->loadView($Iid);		
			}elseif($result===1){
				//echo "delete successfully!";
				$this->loadView($Iid);
			}else{
				echo "database error!";
			}

		}else{
			$this->load_view('pleaseLogin');
		}

	}


	public function dislike($Iid){
		if($this->session->userdata('is_logged_in')){
			$this->load->model("model_idea");
			$result=$this->model_idea->dislike($Iid);
			if ($result===false){
				echo "You're not allowed to like your own Idea !";
				$this->loadView($Iid);		
			}elseif($result===1){
				//echo "delete successfully!";
				$this->loadView($Iid);
			}else{
				echo "database error!";
			}

		}else{
			$this->load_view('pleaseLogin');
		}

	}


}
?>
