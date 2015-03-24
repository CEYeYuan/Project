<?php

class Model_idea extends CI_Model{

	public function add_idea(){
	
		$data=array(
			'title'=>$this->input->post('title'),
			'market'=>$this->input->post('market'),
			'username'=>$this->session->userdata('username'),
			'description'=>$this->input->post('description'),
			'market'=>$this->input->post('market'),
			'dateOfInit'=>date("Y-m-d H:i:s")
	);
		$query=$this->db->insert('Idea',$data);
		if ($query){
			return true;
		}
		else{
			return false;
		}
	}


	public function query_myIdea(){
			
		$user=$this->session->userdata('username');
		$sql="select * from User natural join Idea where username='$user' Order by dateOfInit DESC";
		$query=$this->db->query($sql);
		if ($query->num_rows()>=1){
			return $query;
		}elseif($query->num_rows()==0){
			return 0;
		}else{
			return false;
		}
	}


	public function query_byIid($Iid){
		$sql="select * from Idea where Iid='$Iid'";
		$query=$this->db->query($sql);
		if ($query->num_rows()==1){
			return $query;
		}else{
			return fasle;
		}

	}

	public function latest_Iid(){
		$username=$this->session->userdata("username");
		$sql="select Iid from Idea where username='$username' and Iid>=all(select Iid from Idea where username='$username')";
		$result=$this->db->query($sql);
		return $result->row()->Iid;
	}





}
