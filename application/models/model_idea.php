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


	public function query_others(){
		$username=$this->session->userdata("username");
		$sql="select * from Idea  where Iid not in (select Iid from Idea where username='$username') ";
		$result=$this->db->query($sql);
		if($result->num_rows()===0){
			return 0;
		}elseif ($result->num_rows()>=1){
			return $result;
		}else{
			return false;
		}
	}



	public function filter_idea(){

		$username=$this->session->userdata('username');
		$health=$this->input->post('health');
		$technology=$this->input->post('technology');
		$education=$this->input->post('education');
		$finance=$this->input->post('finance');
		$travel=$this->input->post('travel');
		$sort=$this->input->post('sort');
		$order=$this->input->post('order');
		$sql="select * from Idea  where Iid not in (select Iid from Idea where username='$username') ";
		if ($finance==false){
			$sql=$sql."and Iid not in (select Iid from Idea where market='finance')";
		}
		if ($health==false){
			$sql=$sql."and Iid not in (select Iid from Idea where market='health')";
		}
		if ($technology==false){
			$sql=$sql."and Iid not in (select Iid from Idea where market='technology')";
		}
		if ($travel==false){
			$sql=$sql."and Iid not in (select Iid from Idea where market='travel')";
		}
		if ($education==false){
			$sql=$sql."and Iid not in (select Iid from Idea where market='education')";
		}
		$sql=$sql."order by $sort $order";
		$result=$this->db->query($sql);
		if($result->num_rows()===0){
			return 0;
		}elseif($result->num_rows()>=1){
			return $result;
		}else{
			return false;
		}

	}


	public function edit_allowed($Iid){
		$username=$this->session->userdata('username');
		$sql="select username from Idea where Iid=$Iid";
		$result=$this->db->query($sql);
		if( $result->row()->username!=$username){
			return false;
		}else{
			$sql="select * from Idea where Iid=$Iid";
			$result=$this->db->query($sql);
			return $result;
		}
		
	}

	public function delete_allowed($Iid){
		$username=$this->session->userdata('username');
		$sql="select username from Idea where Iid=$Iid";
		$result=$this->db->query($sql);
		if( $result->row()->username!=$username){
			return false;
		}else{
			$sql="delete from Idea where Iid='$Iid';";
			$result=$this->db->query($sql);
			$sql="delete from Keywords where Iid='$Iid'";
			$result=$this->db->query($sql);
			$sql="delete from Likes where Iid='$Iid'";
			$result=$this->db->query($sql);
			return 1;
		
	}}



}
