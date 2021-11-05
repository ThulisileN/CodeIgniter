<?php

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	
	function index() {
	
		$this->load->view('todo/register');
	}
	
	function run()
	{
		$this->model->run();
		
	}
	
	
	/* logging out the user */
	function logout()
	{
		header('location: index');
		exit;
	}
}