<?php
class contactform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        //$this->load->database();
    }

    function index()
    {
        //set validation rules
        $this->form_validation->set_rules('name', 'Name');
        $this->form_validation->set_rules('email', 'Email');
        $this->form_validation->set_rules('cell', 'Cell');
        
        //run validation on post data
        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            $this->load->view('contact_form_view');
        }
        else
        {
            //insert the contact form data into database
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'cell' => $this->input->post('cell')
            );

            if ($this->db->insert('contacts', $data))
            {
                // success
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">We received your message! Will get back to you shortly!!!</div>');
                redirect('contactform/index');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Some Error.  Please try again later!!!</div>');
                redirect('contactform/index');
            }
        }
    }
    
    //custom callback to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>