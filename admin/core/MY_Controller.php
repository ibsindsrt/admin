<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	function __construct() {
		parent::__construct();
		if ($this->session->userdata('account_id') == null)
			redirect('', "refresh");
		else {
			if ($this->session->userdata('locked') != null) {
				redirect('login/locked', "refresh");
			} //$this->session->userdata('locked') != null
		}
	}
}
?>
