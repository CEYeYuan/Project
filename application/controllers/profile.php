<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index() {
		// session check
		$this->load->model('model_users');
		if ($this->session->userdata('is_logged_in')) {
			$this->load->model('model_users');
			$query=$this->model_users->query_profile();

			if ($query->row()->gender=='M') {
			$genM=True;
			$genF=False;
			}elseif ($query->row()->gender=='F'){
			$genM=False;
			$genF=True;
			}else{
				$genM=False;
				$genF=False;
			}
		$data['username']=$query->row()->username ;
		$data['yy']=substr($query->row()->DateofBirth, 0,4);
		$ypos=strpos($query->row()->DateofBirth,"y");
		$mpos=strpos($query->row()->DateofBirth,"m");
		$dpos=strpos($query->row()->DateofBirth,"d");
		$data['mm']=substr($query->row()->DateofBirth, $ypos+1,$mpos-$ypos-1);
		$data['dd']=substr($query->row()->DateofBirth, $mpos+1,$dpos-$mpos-1);
		$data['firstname']=$query->row()->firstName;
		$data['lastname']=$query->row()->lastName;
		

		$queryfund=$this->model_users->query_fund();
		$i=0;
		$data['fund0']=$data['fund1']="";
		while ($i<$queryfund->num_rows()){
		$data['fund'."$i"]=$queryfund->row($i)->pname;
		$i++;
		}
		
		
		$queryfund=$this->model_users->query_init();
		$i=0;
		$data['init0']=$data['init1']="";
		while ($i<$queryfund->num_rows()){
		$data['init'."$i"]=$queryfund->row($i)->pname;
		$i++;
		}
		
		
			$this->load->view('profile_view',$data);
		} else {
			$this->load->view('pleaseLogin');
		}
	


	}






	public function profile_update(){
		$this->load->model('model_users');
		if($this->session->userdata('is_logged_in')){
			echo "change saved!";
			$this->load->view('home_view');
		}else{
			$this->load->view('pleaseLogin');
		}
    }

    public function profile_update_validition(){
		$this->load->model('model_users');
		$this->load->library('form_validation');
		if($this->session->userdata('is_logged_in')){
			$this->form_validation->set_rules('fn','First Name','required');
			$this->form_validation->set_rules('ln','Last Name','required');
			$this->form_validation->set_rules('pswd','New Password','trim');
			$this->form_validation->set_rules('cpswd','Confirm Password',
				'trim|matches[pswd]');

				if($this->form_validation->run()){
				
					if($this->model_users->update_profile())
					{echo "change saved!";
					$this->load->view('home_view');}
				}else{
					
				$this->index();
				}
			}
			
		else{
			$this->load->view('pleaseLogin');
		}


    
}
}
