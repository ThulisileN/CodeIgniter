<?php
class Hello_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    public function submit_index($data)
	{
		$this->db->insert('user_data', $data);
	}
}