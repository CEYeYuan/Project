<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller for the Project Description page

class Project extends CI_Controller {
	
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
			
			$pidIn['pid'] = $dataIn;
			
			// load the model
			$this->load->model('project_model');
			
			// get the project title
			$data['pTitle'] = $this->project_model->getTitle($pidIn);
			
			// get the project description
			$data['description'] = $this->project_model->getDescription($pidIn);
			
			// get the number of funders for the project
			$data['numFunders'] = $this->project_model->getNumFunders($pidIn);
			
			// get the number of days to go before the refund
			$data['daysToGo'] = $this->project_model->getDaysToGo($pidIn);
			
			// get the project's rating
			$data['prating'] = $this->project_model->getProjectRating($pidIn);
			
			// get the money raised so far
			$data['cashFunded'] = $this->project_model->getCashSoFar($pidIn);
			
			// get the total amount of money needed
			$data['cashNeeded'] = $this->project_model->getCashNeeded($pidIn);
			
			// pass in the pId
			$data['pid'] = $dataIn;
			
			//load the view
			$this->load->view('project_view', $data);
			
		} else {
			$this->load->view('pleaseLogin');
		}
		
	}
	
	public function fundProject($valueIn) {
		
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			// get the pid
			$data['pid'] = $valueIn;
			
			// get the POST values from the form
			$data['dollars'] = $this->input->post('dollars');
			$data['cents'] = $this->input->post('cents');
			
			$pidIn['pid'] = $valueIn;
			
			// get all the other stuff needed for the page
			// load the model
			$this->load->model('project_model');
			
			$data['username'] = $this->session->userdata('email');
			
			// add funds made into the db
			$data['donationQuery'] = $this->project_model->makeDonation($data);
			
			// ---------------------------------
			// The following code is the same as in the initial
			// project->loadView() function on this page
			// ---------------------------------
			
			// get the project title
			$data['pTitle'] = $this->project_model->getTitle($pidIn);
			
			// get the project description
			$data['description'] = $this->project_model->getDescription($pidIn);
			
			// get the number of funders for the project
			$data['numFunders'] = $this->project_model->getNumFunders($pidIn);
			
			// get the number of days to go before the refund
			$data['daysToGo'] = $this->project_model->getDaysToGo($pidIn);
			
			// get the project's rating
			$data['prating'] = $this->project_model->getProjectRating($pidIn);
			
			// get the money raised so far
			$data['cashFunded'] = $this->project_model->getCashSoFar($pidIn);
			
			// get the total amount of money needed
			$data['cashNeeded'] = $this->project_model->getCashNeeded($pidIn);
			
			//load the view
			$this->load->view('project_view', $data);
			
		} else {
			$this->load->view('pleaseLogin');
		}
		
	}
	
}