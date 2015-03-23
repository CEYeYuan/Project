<?php

class Discover_model extends CI_Model {
	
	public function createViews($data) {
		
		// get the $cid value from $data passed in
		$cid = $data['cid'];
		
		// create the query to create the first DB view
		// this uses the $cid variable passed in
		$firstQuery = "CREATE VIEW tmpView AS (SELECT Pro.pid AS pid, Pro.pname AS pname, Pro.description AS description, Procat.cid AS cid, Pro.pic AS pic FROM Project Pro JOIN ProjCat Procat ON Pro.pid = Procat.pid WHERE Pro.active=1 AND Procat.cid=" . $cid . ");";
		
		// create view tmpView
		$query = $this->db->query($firstQuery);
		
		// create view projectsInCid
		$query = $this->db->query("CREATE VIEW projectsInCid AS (SELECT tmp.pid AS pid, tmp.pname AS pname, tmp.description AS description, tmp.pic AS pic, tmp.cid AS cid, cat.name AS cname FROM tmpView tmp JOIN Category cat ON tmp.cid=cat.cid WHERE cat.active=1);");
		
		// creatve view mostPopularInCid
		$query = $this->db->query("CREATE VIEW mostPopularInCid AS (SELECT Pro.pid AS pid, Pro.pname AS pname, Pro.description AS description, Pro.pic AS pic, Pro.cname AS cname, SUM(RP.rating) AS netSum FROM projectsInCid Pro JOIN RateProj RP ON Pro.pid=RP.pid GROUP BY Pro.pid LIMIT 3);");
	}
	
	public function removeTempViews() {
		$tmpQuery = $this->db->query("DROP VIEW mostPopularInCid;");
		$tmpQuery = $this->db->query("DROP VIEW projectsInCid;");
		$tmpQuery = $this->db->query("DROP VIEW tmpView;");
	}
	
	public function getCommunity($data) {
		
		// get the $cid value from $data passed in
		$cid = $data['cid'];
		
		// run the query
		$comQuery = $this->db->query("SELECT name FROM Category WHERE cid=" . $cid . ";");
		
		return $comQuery->result();
	}
	
	public function getAll($data) {
		// db is already auto-loaded
		
		// create the necessary views
		$this->createViews($data);
		
		// run our query
		$query = $this->db->query("SELECT * FROM mostPopularInCid;");
		
		// delete temp views/clean up
		$this->removeTempViews();
		
		// return the result of our query
		return $query->result();
		
	}
	
	
}