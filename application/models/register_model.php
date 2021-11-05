<?php

class Login_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		
		$user_name=$_POST['user_name'];
		$password=md5($_POST['password']);
		
		$res= $this->db->select("SELECT * FROM `register` WHERE username = '".$user_name."' AND password = '".$password."'");
		$count = count($res);
		
	}
		
}