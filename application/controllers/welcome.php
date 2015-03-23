<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller for the discover/Welcome page

class Welcome extends CI_Controller {
	
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
			
			// query the database to get all the communities
			$this->load->model("welcome_model");
			
			// get the results from our query
			$data['results'] = $this->welcome_model->getAll();
			
			// load the welcome view and pass the query data into the view
			$this->load->view('welcome_view', $data);
			
		} else {
			$this->load->view('pleaseLogin');
		}
	}

}