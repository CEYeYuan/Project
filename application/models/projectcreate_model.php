<?php

class Projectcreate_model extends CI_Model {
	
	// return all existing categories
	public function getCategories() {
		
		$categories = $this->db->query("SELECT name FROM Category ORDER BY name ASC;");
		
		return $categories->result();
	}
	
	public function getInid($UID) {
		$uid = $UID;
		
		$query = $this->db->query("SELECT inid FROM Initiator WHERE active=1 AND uid='" . $uid . "';");
		$row = $query->row();
		$inid = $row->inid;
		
		// this is a variable, not an array
		return $inid;
	}
	
	/* BUGGY CODE - NEED TO FIX
	// insert a new project into the database
	public function insertProject($inputData) {
		
		// get all data from $inputData
		$title = $inputData['title'];
		$category = $inputData['category'];
		$year = $inputData['year'];
		$month = $inputData['month'];
		$day = $inputData['day'];
		$description = $inputData['description'];
		$dollars = $inputData['dollars'];
		$cents = $inputData['cents'];
		
		$username = $inputData['username'];
		
		
		$fundsNeeded = $dollars . "." . $cents;
		$startDate = $year . "-" . $month . "-" . $day . " 00:00:00";
		
		// check if user is already an initiator
		
		// get the uid
		$query0 = $this->db->query("SELECT uid FROM User WHERE active=1 AND username='" . $username "';");
		$row = $query0->row();
		$uid = $row->uid;
		
		// view1 - map the inid/uid of the user with $username
		$query1 = $this->db->query("CREATE VIEW view1 AS (SELECT US.uid AS uid, IN.inid AS inid, US.username AS username FROM User US JOIN Initiator IN ON US.uid=IN.uid WHERE US.active=1 AND IN.active=1 AND US.username='" . $username . "');");
		$query2 = $this->db->query("SELECT * FROM view1;");
		
		if ($query2->num_rows() > 0) {
			// user is already and initiator
			
			// get the inid
			$inid = $this->getInid($uid);
			
			// create the project
			// "INSERT INTO Project (pname, description, fundsNeeded, startDate, endDate, postDate, pic, active) VALUES (" . $title . ", " . $description . ", " . $fundsNeeded . ", '" . $startDate . "', "
			//$query4 = $this->db->query("");
			
			// add the project to a category
			
			// INSERT INTO 
			
			return $query2->num_rows();
			
		} else {
			// user is not an initiator
		}
		
		
	}
	* */
	
}