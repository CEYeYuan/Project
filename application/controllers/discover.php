<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller for the Discover page

class Discover extends CI_Controller {
	
	public function index($valueIn) {
		
		$var1 = $valueIn;
		
		// session check
		if ($this->session->userdata('is_logged_in')) {
			// class entry function
			$this->loadView($var1);
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	public function loadView($dataIn) {
		
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			$cidIn['cid'] = $dataIn;
		
			// load the model
			$this->load->model("discover_model");
			
			// get the results from our query
			$data['results'] = $this->discover_model->getAll($cidIn);
			
			// get the name of the category with $cid
			$data['category'] = $this->discover_model->getCommunity($cidIn);
			
			// load the discover view
			$this->load->view('discover_view', $data);
		} else {
			$this->load->view('pleaseLogin');
		}	
	}
}

