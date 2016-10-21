<?php
class Backendlogin extends CI_Model {
	public function start_session() {
		$data  = array(
			'Logininfo' => $this->input->post('Logininfo'),
			'Password' => $this->input->post('Password')
		);
		$sql   = "SELECT * FROM EmployeeMst WHERE BINARY EmployeeID = ? OR BINARY UserName = ? AND BINARY Password = ?";
		$query = $this->db->query($sql, array(
			$data['Logininfo'],
			$data['Logininfo'],
			$data['Password']
		));
				$row = $query->row();
if($row){
				$accountid = $row->EmployeeID;
				$role = $row->Role;}

		if (!is_null($data['Logininfo']) && $query->num_rows() == 1) {
			$this->session->set_userdata('account_id', $accountid);
			$this->session->set_userdata('password', $data['Password']);
			$this->session->set_userdata('role', $role);
			return true;
		}
		return null;
	}
	public function resume_session() {
		$data = array(
			'Password' => $this->input->post('Password')
		);
		if ($data['Password'] == $this->session->userdata('password'))
			return true;
		else
			return null;
	}
}
?>
