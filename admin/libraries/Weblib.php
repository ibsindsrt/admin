<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Weblib {
	var $ci;
	function __construct() {
		$this->ci =& get_instance();
	}
	function load($tpl_view, $body_view = null, $data = null) {
		if (!is_null($body_view)) {
			if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
				$body_view_path = $tpl_view . '/' . $body_view;
			} //file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)
			else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')) {
				$body_view_path = $tpl_view . '/' . $body_view . '.php';
			} //file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')
			else if (file_exists(APPPATH . 'views/' . $body_view)) {
				$body_view_path = $body_view;
			} //file_exists(APPPATH . 'views/' . $body_view)
			else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
				$body_view_path = $body_view . '.php';
			} //file_exists(APPPATH . 'views/' . $body_view . '.php')
			else {
				show_error('Unable to load the requested file: ' . $tpl_view . '/' . $body_view . '.php');
			}
			$body = $this->ci->load->view($body_view_path, $data, TRUE);
			if (is_null($data)) {
				$data = array(
					'body' => $body
				);
			} //is_null($data)
			else if (is_array($data)) {
				$data['body'] = $body;
			} //is_array($data)
			else if (is_object($data)) {
				$data->body = $body;
			} //is_object($data)
		} //!is_null($body_view)
		$this->ci->load->view('master/' . $tpl_view, $data);
	}
}
?>