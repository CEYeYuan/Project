<?php
include(APPPATH.'libraries/REST_Controller.php');
class restful extends REST_Controller
{	
	
    public function index_get()
    {
    	$this->load->view("restful_view");
    }

    public function index_post()
    {
        $this->load->model('model_idea');
		if ($data=$this->model_idea->query_by_marktet()){
			$this->load->view("chart_view",$data);
		}else{
			echo "database error";
			$this->load->view("chart_view",$data);
		}
    }

    public function graph_get()
    {$this->load->model('model_idea');
		if ($data=$this->model_idea->query_by_marktet()){
			$this->load->view("chart_view",$data);
		}else{
			echo "database error";
			$this->load->view("chart_view",$data);
		}
        // Display all books
    }


    function ideas_get()
    {	
    	$num=$this->get('num');
    	$day1=$this->get('date1');
    	$day2=$this->get('date2');
    	$this->load->model('model_idea');
    	$result=$this->model_idea->get_top($num,$day1,$day2);
    	echo $day1;
    	echo $day2;
	
		print json_encode($result);
		
    }

     function ideas_post()
    {	
    	$num=$this->input->post('num');
    	$day1=$this->input->post('date1');
    	$day2=$this->input->post('date2');
    	$this->load->model('model_idea');
    	$result=$this->model_idea->get_top($num,$day1,$day2);
    	echo $day1;
    	echo $day2;
	
		print json_encode($result);
		
    }
}
?>
