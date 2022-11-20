<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->database('default');
    }

	public function index(){
		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
			$list['schools'] = $this->getList();
			$table['table'] = $this->load->view('schoolTable', $list, true);
            $data['content'] = $this->load->view('listSchools', $table, true);
            $this->load->view('layout', $data);
		}
		
	}


	public function create(){
		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
            $data['content'] = $this->load->view('addSchools', [], true);
            $this->load->view('layout', $data);
		}
		
	}

	public function insertSchool(){

		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
			$school_name = $this->input->post('school_name');
            $school_location = $this->input->post('school_location');
			$user = $this->session->userdata('id');

			$data = array(
				'user_id' => $user,
				'school_name' => $school_name,
				'school_address' => $school_location,
				'active' => TRUE
			);

			$response = $this->db->insert('school_master', $data);
			if($response){
				$this->session->set_flashdata('success', 'School added successfully.');
				echo json_encode(array('status'=> 'success', 'message' => 'School has been added Successfully.'));
				die;
			}else{
				echo json_encode(array('status'=> 'error', 'message' => 'Something went wrong while adding School.'));
				die;
			}
		}
	}



	public function getlist($id = ''){
		$this->db->select('*');
		if(!empty($id)){
			$this->db->where('id', $id);
		}$this->db->order_by('id ASC');
		$this->db->where('user_id', $this->session->userdata('id'));
		$result = $this->db->get('school_master')->result_array();

		return $result;
	}

	public function edit($record_id = ''){
		$result['response'] = $this->getList($record_id)[0];
		$data['content'] = $this->load->view('editForm', $result, true);
		$this->load->view('layout', $data);
	}
	public function editSchool(){
		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
			$school_name = $this->input->post('school_name');
            $school_location = $this->input->post('school_location');
            $school_id = $this->input->post('school_id');
			$data = array(
				'school_name' => $school_name,
				'school_address' => $school_location
			);		
		
			$this->db->where('id', $school_id);
			$response = $this->db->update('school_master', $data);
			if($response){
				$this->session->set_flashdata('success', 'School updated successfully.');
				echo json_encode(array('status'=> 'success', 'message' => 'School has been updated Successfully.'));
				die;
			}else{
				echo json_encode(array('status'=> 'error', 'message' => 'Something went wrong while updating School.'));
				die;
			}
		}
	}
	public function deleteSchool(){
		$data = array();
		$email = $this->session->userdata('email');
		if(empty($email)){
			redirect(base_url('login'));
		}else{ 
			$school_name = $this->input->post('school_name');
            $school_location = $this->input->post('school_location');
            $school_id = $this->input->post('school_id');
			$data = array(
				'school_name' => $school_name,
				'school_address' => $school_location
			);		
		
			$this->db->where('id', $school_id);
			$response = $this->db->delete('school_master', $data);
			if($response){
				$this->session->set_flashdata('success', 'School deleted successfully.');
				echo json_encode(array('status'=> 'success', 'message' => 'School has been deleted Successfully.'));
				die;
			}else{
				echo json_encode(array('status'=> 'error', 'message' => 'Something went wrong while deleting School.'));
				die;
			}
		}
	}


}