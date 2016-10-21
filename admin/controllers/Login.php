<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('backendlogin');
	}
	public function index() {
	if ($this->session->userdata('account_id') != null && $this->session->userdata('locked') == null){
		if ($this->session->userdata('role') == "Superadmin") redirect('Dashboard', "refresh");
		if ($this->session->userdata('role') == "Hr") redirect('Hr', "refresh");
		if ($this->session->userdata('role') == "Accounts") redirect('Accounts', "refresh");}
	$ifloged_in = $this->backendlogin->start_session();
	if (is_null($ifloged_in) && $this->session->userdata('locked') == null){
		$this->load->view('login');
}
	elseif(!is_null($ifloged_in) && $this->session->userdata('locked') == null){
			redirect('', "refresh");
	}
	elseif($this->session->userdata('locked') != null) {
			redirect('Login/locked', "refresh");
	}
}	
	public function locked() {
		$if_resumed = $this->backendlogin->resume_session();
		if ($if_resumed != null) {
			$this->session->set_userdata('locked', null);
			redirect($this->session->userdata('last_redirect'), "refresh");
		} //$if_resumed != null
		else
			$this->load->view('locked');
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('Login', "refresh");
	}
	public function check_timeout($con = null) {
		$link = $this->input->get('url');
		$link = str_replace(base_url(),"",$link);
		$this->session->set_userdata('last_redirect', $link);
		$this->session->set_userdata('locked', 'yes');
	}
}
?>
	
