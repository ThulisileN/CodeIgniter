<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {
	function __construct(){
		parent::__construct();
		// Load Helper
		$this->load->helper('url');
		// Load Model
		$this->load->model('Todo_Model');
        $this->load->library('form_validation');
	}
	// todo list
	function index(){
		$data['page_title']="To-Do List";
		$data['totalResult']=$this->Todo_Model->count_list();
		$data['content']=$this->Todo_Model->get_all_list();
		$this->load->view('todo/todo',$data);
        // Load Library
        
	}
    // add
    function add(){
		$data['page_title']="Add To-Do List";
		// Submit Form
		$this->form_validation->set_rules('task_title','Task Title','trim|required');
		if($this->form_validation->run()===true){
			// Submit Form
		$this->form_validation->set_rules('task_title','Task Title','trim|required');
		if($this->form_validation->run()===true){
			// Process the data
			$dbRes=$this->Todo_Model->add();
			$data['msg']=$dbRes;
		}
		}
		$this->form_validation->set_rules('task_descsription','Task Description','trim|required');
		if($this->form_validation->run()===true){
			// Submit Form
		$this->form_validation->set_rules('task_description','Task Description','trim|required');
		if($this->form_validation->run()===true){
			// Process the data
			$dbRes=$this->Todo_Model->add();
			$data['msg']=$dbRes;
		}
		}
		$this->load->view('todo/add.php',$data);
	} 
    public function edit($id) {
        
            //Fetches the task by id
            $content = $this->Todo_Model->find_content($id);
            $this->load->view('todo/update',array('content'=>$content));

        }

        //Updates the task
    public function update($id){
        $this->form_validation->set_rules('task_title','Task Title','trim|required');
		$this->form_validation->set_rules('task_description','Task Description','trim|required');
        $this->form_validation->set_rules('task_status','Task Status','trim|required');

        if($this->form_validation->run()===TRUE){
			$this->Todo_Model->update($id);
            redirect(site_url('todo/index'));
		}

    }
    // Delete Data
	function delete($id){
		$dbRes=$this->Todo_Model->delete($id);
		redirect(site_url('todo/index'));
	}
	//Login
	function login() {
		$this->form_validation->set_rules('user_name','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
		$this->load->view('todo/login');
	}
}