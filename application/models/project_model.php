<?php

class Project_model extends CI_Model {
	
	public function getTitle($data) {
		
		// get the $pid value from $data
		$pid = $data['pid'];
		
		// run the query
		$titleQuery = $this->db->query("SELECT pname FROM Project WHERE pid=" . $pid . ";");
		
		return $titleQuery->result();
		
	}
	
	public function getDescription($data) {
		// get the $pid value from $data
		$pid = $data['pid'];
		
		// run the query
		$descriptionQuery = $this->db->query("SELECT description FROM Project WHERE pid=" . $pid . ";");
		
		return $descriptionQuery->result();
	}
	
	public function getNumFunders($data) {
		
		// get the $pid value from $data
		$pid = $data['pid'];
		
		// run the query
		$numFunders = $this->db->query("SELECT DISTINCT COUNT(fid) AS total FROM Fund WHERE pid=" . $pid . ";");
		
		return $numFunders->result();
	}
	
	public function getDaysToGo($data) {
		$pid = $data['pid'];
		
		/*
		 * Example query result for the next query
		 * 
		 * +----------+
		   | diffDate |
		   +----------+
		   |      106 |
		   +----------+
		 * 
		 * */
		
		$daysToGo = $this->db->query("SELECT DATEDIFF((SELECT endDate FROM Project WHERE pid=" . $pid . "), now()) AS diffDate;");
		
		return $daysToGo->result();
	}
	
	public function getProjectRating($data) {
		
		$pid = $data['pid'];
		
		$prating = $this->db->query("SELECT IFNULL(SUM(rating),0) AS total FROM RateProj WHERE pid=" . $pid . ";");
		
		return $prating->result();
		
	}
	
	public function getCashSoFar($data) {
		$pid = $data['pid'];
		
		$cashFunded = $this->db->query("SELECT IFNULL(SUM(amount),0) AS total FROM Fund WHERE pid=" . $pid . ";");
		
		return $cashFunded->result();
	}
	
	public function getCashNeeded($data) {
		$pid = $data['pid'];
		
		$cashNeeded = $this->db->query("SELECT IFNULL(fundsNeeded, 0) AS needed FROM Project WHERE pid=" . $pid . ";");
		
		return $cashNeeded->result();
		
	}
	
	// takes in a uid parameter and returns the fid
	public function getFid($UID) {
		$uid = $UID;
		
		$query = $this->db->query("SELECT fid FROM Funder WHERE active=1 AND uid='" . $uid . "';");
		$row = $query->row();
		$fid = $row->fid;
		
		// this is a variable, not an array
		return $fid;
	}
	
	public function makeDonation($data) {
		$pid = $data['pid'];
		$username = $data['username'];
		
		// get the donation info
		$dollars = $data['dollars'];
		$cents = $data['cents'];
		
		// get the uid from the username
		$query0 = $this->db->query("SELECT uid FROM User WHERE active=1 AND username='" . $username . "';");
		$row = $query0->row();
		$uid = $row->uid;
		
		// view 1 - map the uid/fid of the user with $username
		$query1 = $this->db->query("CREATE VIEW view1 AS (SELECT US.uid AS uid, FD.fid AS fid, US.username AS username FROM User US JOIN Funder FD ON FD.uid=US.uid WHERE US.active=1 AND FD.active=1 AND US.username='" . $username . "');");
		
		$query2 = $this->db->query("SELECT * FROM view1;");
		
		if ($query2->num_rows() > 0) {
			// user is already a funder
			
			// get the fid
			$fid = $this->getFid($uid);
			
			// fund the project
			$query4 = $this->db->query("INSERT INTO Fund (fid, pid, date, amount) VALUES (" . $fid . ", " . $pid . ", now(), " . $dollars . "." . $cents . ");");
			
		} else {
			// user is not a funder
			
			// make user a funder
			$query3 = $this->db->query("INSERT INTO Funder (uid, active) VALUES (" . $uid . ", 1);");
			
			// get the user's fid
			$fid = $this->getFid($uid);
			
			// fund the project
			$query4 = $this->db->query("INSERT INTO Fund (fid, pid, date, amount) VALUES (" . $fid . ", " . $pid . ", now(), " . $dollars . "." . $cents . ");");
		}
		
		// clean up db views
		$cleanQuery = $this->db->query("DROP VIEW view1;");
		
	}
	
}