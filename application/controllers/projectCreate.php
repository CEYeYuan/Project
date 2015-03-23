<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controller for the Create Project Page

class ProjectCreate extends CI_Controller {
	
	public function index() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			$this->loadView();
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	public function loadView() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			// load the model
			$this->load->model('projectcreate_model');
			
			// get all the existing categories from the DB
			$data['categories'] = $this->projectcreate_model->getCategories();
			
			$this->load->view('projectCreate_view', $data);
			
			/* DEBUG CODE
			
			$this->load->view('projectCreate_view');
			
			// load the model
			$this->load->model('projectcreate_model');
			
			$this->load->view('projectCreate_viewTMP');
			*/
			
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	
	public function create() {
		// session check
		if ($this->session->userdata('is_logged_in')) {
			
			// get all the form data values
			$inputData['title'] = $this->input->post('title');
			$inputData['category'] = $this->input->post('category');
			$inputData['year'] = $this->input->post('year');
			$inputData['month'] = $this->input->post('month');
			$inputData['day'] = $this->input->post('day');
			$inputData['description'] = $this->input->post('description');
			$inputData['dollars'] = $this->input->post('dollars');
			$inputData['cents'] = $this->input->post('cents');
			
			// get user info from the session
			$inputData['username'] = $this->session->userdata('email');
			
			// load the model
			$this->load->model('projectcreate_model');
			
			// run the queries
			$this->projectcreate_model->insertProject($inputData);
			
		} else {
			$this->load->view('pleaseLogin');
		}
	}
	
	
}