	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database('default');
	}
	public function index()
	{

		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
			$list['schools'] = getList();
			$table['table'] = $this->load->view('schoolTable', $list, true);
            $data['content'] = $this->load->view('listSchools', $table, true);
            $this->load->view('layout', $data);
		}
	}

}