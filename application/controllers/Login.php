<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

	public function index()	{
		$this->load->view('login');
	}

	public function userLogin(){
		
		$data['response'] = '';
		
        if (stripos(strtolower($_SERVER['REQUEST_METHOD']), 'post') !== FALSE) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
			
            if ($this->form_validation->run() == FALSE) {
                $data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Please enter valid username and password');
            } else {
				
                $username = $this->input->post('username');
                $password = $this->input->post('password');
				$this->db->select('id,name,email,password,salt');
				$this->db->where('email', $username);
				$query = $this->db->get('users')->result_array();
				if(!empty($query)){
					if ($username == $query[0]['email']) {
						if (crypt($password,$query[0]['salt']) == $query[0]['password']) {
							$user_data = array('name' => $query[0]['name'], 'email' => $query[0]['email'], 'id' => $query[0]['id']);
							$this->session->set_userdata($user_data);
							
								redirect(base_url('dashboard'));
						}
						else {
							$data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Please enter valid username and password');
						}
					} else {
						$data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Please enter valid username and password');
					}
				}else{
					$data['response'] = array('status' => 'failed', 'ErrorDesc' => 'Please enter valid username and password');
				}
                
            }
        }
        $this->load->view('login', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('/login'));
	}
}