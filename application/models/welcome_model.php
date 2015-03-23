<?php

class Welcome_model extends CI_Model {

	public function getAll() {
		// db is already auto-loaded
		$query = $this->db->query("SELECT cid, name, description, active FROM Category WHERE active='1' ORDER BY name;");
		
		// the results() function puts the results into an array we can access
		return $query->result();
	}

}