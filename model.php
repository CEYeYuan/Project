<!DOCTYPE HTML>


<?php

//Create connection with database;

	
	$servername="localhost";
	$username="root";
	$password="314159";
	$dbname="dtbase";

	$conn=new mysqli($servername,$username,$password,$dbname);

	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error."<br/>");
	}else{
		echo "Connected successfully"."<br/>";
	}
	
	


	//test if form send the data correctly
		/*$usr= $_POST['username'];
		$psw=$_POST['password'];
		echo $usr;
		echo $psw;*/


	/*public function login(){
		echo "true";

	}*/

	function signup($conn){

		$usr= $_POST['signName'];
		$psw=$_POST['signPassword'];
		/*echo $usr;
		echo $psw;*/
		$sql="INSERT INTO User(username,password) VALUES ($usr,$psw)";
		if ($conn->query($sql)===true){
			echo "New User added! <br/>";
			return true;
		}else{
			echo "Failed, Please try again.".$connection->error."<br/>";
			return false;
	}}

	//signup($conn);


	function login($conn){

		$usr=$_POST['username'];
		$psw=$_POST['password'];
		/*echo $usr;
		echo $psw;*/
		$sql="select * from User where username=$usr and password=$psw";
		$result=$conn->query($sql);
	//	echo $result->num_rows."<br/>";
		return ($result->num_rows);
	}

	//echo "good!";
	
	function can_login($conn){
		if (login($conn)===1){
			echo "Login successfully! <br/>";
			return true;
		}
		else{
			echo "username/password doesn't match !<br/>";
			return false;
		}
	}

	login($conn);
	can_login($conn);
	




	
?>
