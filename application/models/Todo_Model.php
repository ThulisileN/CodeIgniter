<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Todo_Model extends CI_Model{
	function __construct(){
		parent::__construct();
		// Load Database
		$this->load->database();
	}
	// Count Total List
	function count_list(){
		return $this->db->count_all('todo_list');
	}
	// Get all list
	function get_all_list(){
		$response=array();
		$query=$this->db->get('todo_list');
		if($query->num_rows()>0){
			$response['bool']=true;
			$response['d']=$query->result_array();
		}else{
			$response['bool']=false;
		}
		return $response;
	}
	/*// Get single list
	function get_single_list(){
		$response=array();
		$query=$this->db->get('todo_list');
		if($query->num_rows()>0){
			$response['bool']=true;
			$response['d']=$query->result_array();
		}else{
			$response['bool']=false;
		}
		return $response;
	}*/

	function add(){
		$insertData=array(
			'task_title'=>$this->input->post('task_title'),
			'task_status'=>'pending'
		);
		$insertQuery=$this->db->insert('todo_list',$insertData);
		/*if($this->db->affected_rows()>0){
			return 'Data has been added';
		}else{
			return 'Data has not been added';
		}*/
	}

	function find_content($id){
		$task = $this->db->get_where('todo_list',array('id'=>$id))->row();
		$status = $this->db->get_where('todo_list',array('id'=>$id))->row();
		return $task;
		return $status;
	}
	/*// Update Data
	function update($id){
		$updateData=array(
			'task_title'=>$this->input->post('task_title'),
			'task_status'=>'pending'
		);
		$this->db->where('id',$id);
		$updateQuery=$this->db->update('todo_list',$updateData);
		if($this->db->affected_rows()>0){
			return 'Data has been updated';
		}else{
			return 'Data has not been updated';
		}
	}*/

	public function update($id){
		$data = array(
			'task_title' => $this->input->post('task_title'),
			'task_status' => $this->input->post('task_status')
		);

		$this->db->where('id',$id);
		return $this->db->update('todo_list',$data);
	}
	// Delete Data
	function delete($id){
		/*$res=array();
		$this->db->where('id',$id);
		$this->db->delete('todo_list');*/

		return $this->db->delete('todo_list', array('id' => $id));
	}
}
?>