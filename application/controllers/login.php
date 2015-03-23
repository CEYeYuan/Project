<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// DAVID's TEST LOGIN - WE ARE NOT USING THIS

class Login extends CI_Controller {
	
	public function index() {
		
		// load the "login_view.php" page
		$this->load->view('login_view');
		
	}
	
	public function signUp() {
		// implement this method
		// this page redirects to the sign up page but does not pass any info
	}
	
	public function submit() {
		// implement this method
		// this is the "Login" button
	}

}