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
		$Iid=$this->latest_Iid();
		$keywords = $this->input->post('keywords');
		$token = strtok($keywords, " ");
		while ($token !== false)
		{
			$data=array(
			'keyword'=>$token,
			'Iid'=>$Iid
			);
			$query=$this->db->insert('Keywords',$data);
			$token = strtok(" ");
		} 
		

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


	public function query_all(){
		$username=$this->session->userdata("username");
		$sql="select * from Idea  where Iid not in (select Iid from Idea where username='$username')  ";

		//query all (include the current user self)
		//$sql="select * from Idea  ";
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
		$keyword=$this->input->post('keyword');
		if (empty($keyword))
			$sql="select * from Idea  where Iid not in (select Iid from Idea where username='$username') ";
		else 
			$sql="select * from Idea natural join Keywords where Iid not in (select Iid from Idea where username='$username')
				and keyword='$keyword' ";
		//query all (include the current user self)
		//$sql="select * from Idea  where true ";
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


	public function edit($Iid){
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

	public function delete($Iid){
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


	public function query_byIid_likes($Iid){
		$username=$this->session->userdata('username');
		$sql="select attitude from Likes where Iid='$Iid' and username='$username'";
		$result=$this->db->query($sql);
		if ($result->num_rows()==0){
			return 0;
		}else{
			return $result->row()->attitude;
		}
	}



	public function like($Iid){
		$username=$this->session->userdata('username');
		$sql="select username from Idea where Iid='$Iid'";
		$result=$this->db->query($sql);
		if ($result->row()->username==$username){
			return false;
		}else{
			if ($this->query_byIid_likes($Iid)!=0){
				$sql="update Likes set attitude='1' where username='$username' and Iid='$Iid'";
				$this->db->query($sql);
				return 1;
			}else{
				$sql="insert into Likes(Iid,username,attitude) values ('$Iid','$username','1') ";
				$this->db->query($sql);
				return 1;
			}
			
		}
	}


	public function dislike($Iid){
		$username=$this->session->userdata('username');
		$sql="select username from Idea where Iid='$Iid'";
		$result=$this->db->query($sql);
		if ($result->row()->username==$username){
			return false;
		}else{
			if ($this->query_byIid_likes($Iid)!=0){
				$sql="update Likes set attitude='-1' where username='$username' and Iid='$Iid'";
				$this->db->query($sql);
				return 1;
			}else{
				$sql="insert into Likes(Iid,username,attitude) values ('$Iid','$username','-1') ";
				$this->db->query($sql);
				return 1;
			}
			
		}
	}


	public function query_by_marktet(){
		$sql="select * from Idea where market='health'";
		$result=$this->db->query($sql);
		$data['health']=$result->num_rows();

		$sql="select * from Idea where market='education'";
		$result=$this->db->query($sql);
		$data['education']=$result->num_rows();

		$sql="select * from Idea where market='technology'";
		$result=$this->db->query($sql);
		$data['technology']=$result->num_rows();

		$sql="select * from Idea where market='finance'";
		$result=$this->db->query($sql);
		$data['finance']=$result->num_rows();

		$sql="select * from Idea where market='travel'";
		$result=$this->db->query($sql);
		$data['travel']=$result->num_rows();
		return $data;
	}


	public function edit_submit($Iid){
		$username=$this->session->userdata('username');
		$sql="select username from Idea where Iid=$Iid";
		$result=$this->db->query($sql);
		if( $result->row()->username!=$username){
			return false;
		}else{
			$title=$this->input->post('title');
			$description=$this->input->post('description');
			$market=$this->input->post('market');
			$sql="update Idea set title='$title',market='$market',description='$description' where Iid='$Iid'";
			$result=$this->db->query($sql);
			$sql="delete from Keywords where Iid='$Iid'";
			$result=$this->db->query($sql);
			$keywords = $this->input->post('keywords');
			$token = strtok($keywords, " ");
			while ($token !== false){
				$data=array(
				'keyword'=>$token,
				'Iid'=>$Iid
				);
				$query=$this->db->insert('Keywords',$data);
				$token = strtok(" ");
			} 
			return 1;
		
	}}


	public function query_keyword($Iid){
		$sql="select keyword from Keywords where Iid='$Iid'";
		$result=$this->db->query($sql);
		if ($result->num_rows()>=1)
			return $result;
		else
			return false;
	}

	public function get_top($num,$day1,$day2){
		//$sql="select * from Idea where Iid='$num'";
		$sql="drop view if exists likecount ;";
		$this->db->query($sql);

		$sql="drop view if exists likeNum ;";
		$this->db->query($sql);

		
		$sql="create view likecount as select * from Likes where attitude='1';";
		$this->db->query($sql);

		$sql="create view likeNum as 
		select Iid,count(*) as numOfLikes from likecount group by Iid order by numOfLikes DESC ;";
		$this->db->query($sql);
		$sql="select * from likeNum natural join Idea where dateOfInit>='$day1' and dateOfInit<='$day2' limit $num  ;";

		$result=$this->db->query($sql);
		if ($result->num_rows()>=1)
			return $result->result();
		else
			return false;
	}

}	
	




