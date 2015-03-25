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
				$this->load->view('share_view');
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
			//echo "good";
			
			$health=$this->input->post('health');
			$technology=$this->input->post('technology');
			$education=$this->input->post('education');
			$finance=$this->input->post('finance');
			$travel=$this->input->post('travel');
			if($health or $technology or $education or $finance or $travel) {
				$this->load->model('model_idea');
				$result=$this->model_idea->filter_idea();
				if ($result===0){	
					echo "No results in the selected market!";
					$url=base_url()."index.php/browse/browseAll";
					echo "<p>";
					echo "<a href='$url'> Search again! </a>";
					echo "</p>";
				}elseif($result->num_rows()>=1){
					$data['result']=$result;
					$this->load->view('browse_view',$data);
				}else{
					echo "Database Error, Please try again";
					$this->browseAll();
				}
		
			}else{
				echo "Please select at least one market";
				$this->browseAll();
			}
			
			//$this->load->view('browse_view',$data);

		}else{
			$this->load_view('pleaseLogin');
		}
	}
}


?>