<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller for the admin console page

class AdminConsole extends CI_Controller {
	
	public function index() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			// class entry function
			$this->loadView();
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	public function loadView() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			$this->load->view('adminConsoleMain_view');
			
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	public function addAdmin() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			$this->load->view('adminConsoleAddAdmin_view');
			
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	
}