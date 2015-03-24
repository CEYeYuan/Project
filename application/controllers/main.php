<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#Main controller for sign up and login page

class Main extends CI_Controller {
	
	public function index() {
		
		//The default function
		// load the "login.php" 
		
		$this->login();

		
	}
	public function login() {
		
		// load the "login.php" page
		$this->load->view('login');
		
	}
	
	
	public function login_validation(){

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','
			required|trim|xss_clean|callback_validate_credientials');
		//'email' is the input form name, while 'Email' is the name when the web gives
		//feedback on login information
		$this->form_validation->set_rules('password','Password','required|md5|trim');
 
		if ($this->form_validation->run()){
			//if the username/password pass the validation test
			
			// load the model
			$this->load->model('model_users');
			
			// get the username from the form
			
			$data=array(
				'username'=>$this->input->post('email'),
				'is_logged_in'=>1
				);			
			$this->session->set_userdata($data);
			//session is constructed with the input form name 'email'

			//redirect ('index.php/welcome');
			//redirect ('index.php/home');
			$this->load->view('home_view');
		} else{
			
			$this->index();
			//if the validation test failed, redirect to the 'restricted page'
		}

	}
	
	public function members(){
		if($this->session->userdata('is_logged_in')){
			$this->load->view('home_view');
		}else{
			$this->load->view('pleaseLogin');
		}
		
	}





	public function validate_credientials(){
		$this->load->model('model_users');

		if($this->model_users->can_log_in()){
			return true;
			// connect to the database to validate the username and password 
		}	else{
			$this->form_validation-> set_message('validate_credientials','Incorect 
				username/password');
			return false;
		}
	}

	public function logout(){
		
		$this->session->sess_destroy();
		//destroy the session when logout

		//redirect('index.php/main/login');
		redirect(base_url());
	}


	public function signup() {
        
        $this->load->view('signup');
		// this page redirects to the sign up page but does not pass any info
	}

	public function signup_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|
			trim|valid_email|is_unique[User.username]');

		//input form 'email' must be an valid email address, moreover, it cannot occur
		//in the database

		$this->form_validation->set_rules('password','Password','required|
			trim');

		$this->form_validation->set_rules('cpassword','Confirm Password','required|
			trim|matches[password]');


		$this->form_validation->set_message('is_unique','That email address already exists.');
		//override the default meaningless error message

		if($this->form_validation->run()){
			
			$this->load->model('model_users');
			
			if ($this->model_users->add_user()){
				echo "success!";		
				}	

			else{
				echo "Problem adding to database";
			}
		}
			
			
		else{
			
			$this->load->view('signup');
		}
	
	}


	
}
	


