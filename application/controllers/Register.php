<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }
	public function index()
	{
		$this->load->view('register');
	}

	public function registerUser(){
		$data['response'] = '';
		
        if (stripos(strtolower($_SERVER['REQUEST_METHOD']), 'post') !== FALSE) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name1', 'Name', 'trim|required');
            $this->form_validation->set_rules('email1', 'Email', 'trim|required');
            $this->form_validation->set_rules('password1', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Please enter all required data.');
            } else {
                $name = $this->input->post('name1');
                $email = $this->input->post('email1');
                $password = $this->input->post('password1');
                $salt = generateRandomString();
				
				$userCheck = $this->checkEmail($email);
				if(empty($userCheck)){
					$data = array(
						'name' => $name,
						'email' => $email,
						'password' => crypt($password,$salt),
						'salt' => $salt
					);
					
					$query =$this->db->insert('users', $data);
					
					if ($query) {
						$this->session->set_flashdata('success', 'User registered successfully.');
						redirect(base_url('/login'));
					} else {
						$data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Something went Wrong.');
					}
				}else{
					$data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Email already in use.');
				}
				
            }
        }
        $this->load->view('register', $data);
	}

	public function checkEmail($email){
		$this->db->select('email');
		$this->db->where('email', $email);
		$result = $this->db->get('users')->result_array();
		return $result;
	}

	
	
	
}