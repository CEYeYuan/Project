<?php
class restful extends CI_Controller{
	
	public function index(){
		$this->load->model('model_idea');
		if ($data=$this->model_idea->query_by_marktet()){
			$this->load->view("chart_view",$data);
		}else{
			echo "database error";
			$this->load->view("chart_view",$data);
		}
		
	
	}}
