<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		if($this->session->userdata('is_logged_in')) {
			$this->loadView();
		} else {
			$this->load->view('pleaseLogin');
		}
		
	}
	public function loadView() {
		if($this->session->userdata('is_logged_in')) {
			$this->load->view('home_view');
		} else {
			$this->load->view('pleaseLogin');
		}
	}
		
}