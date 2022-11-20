<?php

	function x($data, $title = '')
	{
		echo "<BR><strong> " . $title . " :</strong><BR>";
		echo "<pre>";
		print_r($data);
		exit;
	}

	function y($data, $title = '')
	{
		echo "<BR><strong> " . $title . " :</strong><BR>";
		echo "<pre>";
		print_r($data);
	}

	function generateRandomString($length = 10)
	{
		return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
	}

	function getlist($id = '')
	{
		$CI = get_instance();
		$CI->load->database('default');
		$CI->db->select('*');
		if (!empty($id)) {
			$CI->db->where('id', $id);
		}
		$CI->db->order_by('id ASC');
		$CI->db->where('user_id', $CI->session->userdata('id'));
		$result = $CI->db->get('school_master')->result_array();

		return $result;
	}
