<?php

class MasterData extends CI_Model {
	public function getcountrylist($searchTerm = Null) {
		$sql   = "SELECT * FROM L_CountryMst WHERE CountryName Like '%$searchTerm%' order by CountryName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $country) {
					$results[] = $country->CountryName;
				} //$query->result() as $country
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else
			return $query;
	}
	public function getcountrylistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM L_CountryMst WHERE CountryName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getcountryrowbyid($id = null) {
		$sql   = "SELECT * FROM L_CountryMst WHERE CountryID =?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getstatelist($country_id, $searchTerm = null) {
		$sql   = "SELECT * FROM L_StateMst WHERE  CountryID = '$country_id' AND StateName Like '%$searchTerm%' order by StateName asc ";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $state) {
					$results[] = $state->StateName;
				} //$query->result() as $state
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else {
			$my_states = array();
			if ($query->result()) {
				foreach ($query->result() as $state) {
					$my_states[$state->StateID] = $state->StateName;
				} //$query->result() as $state
				return $my_states;
			} //$query->result()
			else {
				return array();
			}
		}
	}
	public function getstatelistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM L_StateMst s INNER JOIN L_CountryMst c ON s.`CountryID`=c.`CountryID` WHERE StateName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getstaterowbyid($id = null) {
		$sql   = "SELECT  s.StateID, s.StateName, c.CountryID,c.CountryName FROM L_StateMst s INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE StateID  = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getdistrictlist($state_id, $searchTerm = null) {
		$sql   = "SELECT * FROM L_DistrictMst WHERE StateID = '$state_id'  AND DistrictName Like '%$searchTerm%' order by DistrictName asc ";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $district) {
					$results[] = $district->DistrictName;
				} //$query->result() as $district
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else {
			$my_districts = array();
			if ($query->result()) {
				foreach ($query->result() as $district) {
					$my_districts[$district->DistrictID] = $district->DistrictName;
				} //$query->result() as $district
				return $my_districts;
			} //$query->result()
			else {
				return array();
			}
		}
	}
	public function getdistrictlistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM L_DistrictMst d INNER JOIN L_StateMst s on d.StateId = s.StateId INNER JOIN L_CountryMst c ON d.CountryID=c.CountryID WHERE DistrictName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getdistrictrowbyid($id = null) {
		$sql   = "SELECT  d.DistrictID, d.DistrictName, s.StateID, s.StateName, c.CountryID,c.CountryName FROM L_DistrictMst d INNER JOIN L_StateMst s on d.StateID=s.StateID INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE DistrictID = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getsubdistrictlist($district_id, $searchTerm = null) {
		$sql   = "SELECT * FROM L_SubDistrictMst WHERE DistrictID = '$district_id'  AND SubDistrictName Like '%$searchTerm%' order by SubDistrictName asc ";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $subdistrict) {
					$results[] = $subdistrict->SubDistrictName;
				} //$query->result() as $subdistrict
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else {
			$my_subdistricts = array();
			if ($query->result()) {
				foreach ($query->result() as $subdistrict) {
					$my_subdistricts[$subdistrict->SubDistrictID] = $subdistrict->SubDistrictName;
				} //$query->result() as $subdistrict
				return $my_subdistricts;
			} //$query->result()
			else {
				return array();
			}
		}
	}
	public function getsubdistrictlistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM L_SubDistrictMst sd INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID INNER JOIN L_StateMst s on d.StateId=s.StateID INNER JOIN L_CountryMst c ON  s.CountryID=c.CountryID WHERE SubDistrictName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getsubdistrictrowbyid($id = null) {
		$sql   = "SELECT sd.SubDistrictID, sd.SubDistrictName, d.DistrictID, d.DistrictName, s.StateID, s.StateName, c.CountryID,c.CountryName FROM L_SubDistrictMst sd INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID INNER JOIN L_StateMst s on d.StateID=s.StateID INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE SubDistrictID = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getcitylist($subdistrict_id, $searchTerm = null) {
		$sql   = "SELECT * FROM L_CityMst WHERE SubDistrictID = '$subdistrict_id'  AND CityName Like '%$searchTerm%' order by CityName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $city) {
					$results[] = $city->CityName;
				} //$query->result() as $city
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else {
			$my_cities = array();
			if ($query->result()) {
				foreach ($query->result() as $city) {
					$my_cities[$city->CityID] = $city->CityName;
				} //$query->result() as $city
				return $my_cities;
			} //$query->result()
			else {
				return array();
			}
		}
	}
	
	public function getcitypincodelist($searchTerm = Null) {
		$sql   = "SELECT DISTINCT Pincode FROM L_CityMst WHERE Pincode Like '%$searchTerm%' order by Pincode asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $pincode) {
					$results[] = $pincode->Pincode;
				} //$query->result() as $pincode
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else
			return $query;
	}
	public function getcityrowbyid($id = null) {
		$sql   = "SELECT ct.CityID, ct.CityName, sd.SubDistrictID, sd.SubDistrictName, d.DistrictID, d.DistrictName, s.StateID, s.StateName, c.CountryID,c.CountryName, ct.Pincode FROM L_CityMst ct INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID INNER JOIN L_StateMst s on d.StateID=s.StateID INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE CityID = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getarealist($city_id, $searchTerm = null) {
		$sql   = "SELECT * FROM L_AreaMst WHERE   CityID = '$city_id'  AND AreaName Like '%$searchTerm%' order by AreaName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $area) {
					$results[] = $area->AreaName;
				} //$query->result() as $area
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else {
			$my_areas = array();
			if ($query->result()) {
				foreach ($query->result() as $area) {
					$my_areas[$area->AreaID] = $area->AreaName;
				} //$query->result() as $area
				return $my_areas;
			} //$query->result()
			else {
				return array();
			}
		}
	}
	public function getarealistbyid($searchTerm = Null) {
		$sql   = "SELECT am.AreaID, am.AreaName, ct.CityName, sd.SubDistrictName, d.DistrictName, s.StateName, c.CountryName, am.Pincode FROM L_AreaMst am INNER JOIN  L_CityMst ct on am.CityID=ct.CityID INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID INNER JOIN L_StateMst s on d.StateID=s.StateID INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE AreaName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getareapincodelist($searchTerm = Null) {
		$sql   = "SELECT DISTINCT Pincode  FROM L_AreaMst WHERE Pincode Like '%$searchTerm%' order by Pincode asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $pincode) {
					$results[] = $pincode->Pincode;
				} //$query->result() as $pincode
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else
			return $query;
	}
	public function getarearowbyid($id = null) {
		$sql   = "SELECT am.AreaID, am.AreaName, ct.CityID, ct.CityName, sd.SubDistrictID, sd.SubDistrictName, d.DistrictID, d.DistrictName, s.StateID, s.StateName, c.CountryID,c.CountryName, am.Pincode FROM L_AreaMst am INNER JOIN  L_CityMst ct on am.CityID=ct.CityID INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID INNER JOIN L_StateMst s on d.StateID=s.StateID INNER JOIN L_CountryMst c on s.CountryID=c.CountryID WHERE AreaID = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getmservicelist($searchTerm = Null) {
		$sql   = "SELECT * FROM Service_Main WHERE MServiceName Like '%$searchTerm%' order by MServiceName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $mservice) {
					$results[] = $mservice->MServiceName;
				} //$query->result() as $mservice
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else
			return $query;
	}
	public function getmservicelistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM Service_Main WHERE MServiceName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getmservicerowbyid($id = null) {
	$sql   = "SELECT * FROM Service_Main WHERE MServiceID =?";
	$query = $this->db->query($sql, array($id));		
	return $query;
}
	public function getsservicelist($searchTerm = Null) {
		$sql   = "SELECT * FROM Service_Sub WHERE SServiceName Like '%$searchTerm%' order by SServiceName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $sservice) {
					$results[] = $sservice->SServiceName;
				} //$query->result() as $sservice
				return $results;
			} //$query->result()
			else
				return array();
		} //!is_null($searchTerm)
		else
			return $query;
	}
	public function getsservicelistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM Service_Sub s INNER JOIN Service_Main m ON s.MServiceID=m.MServiceID  WHERE SServiceName Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	public function getsservicerowbyid($id = null) {
		$sql   = "SELECT s.SServiceID, s.SServiceName,s.SDescription, an.MServiceID,an.MServiceName FROM Service_Sub s INNER JOIN Service_Main an on s.MServiceID=an.MServiceID where SServiceID = ?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	
	public function add_country() {
		
		$data  = array(
			'CountryName' => $this->input->post('CountryName'),
			'ModifiedBy' => $this->session->userdata('account_id')
			
		);
		$sql   = "SELECT CountryName FROM L_CountryMst WHERE CountryName = ?";
		$query = $this->db->query($sql, array(
			$data['CountryName']
		));
		if (!is_null($data['CountryName']) && $query->num_rows() == 0) {
			$this->db->insert('L_CountryMst', $data);
			return "Country Name Added Sucessfully";
		} //!is_null($data['CountryName']) && $query->num_rows() == 0
		elseif (is_null($data['CountryName'])) {
			return "";
		} //is_null($data['CountryName'])
		else {
			return "Country Name Already Exists";
		}
	}
	public function update_country($id) {
		$data = array(
			'CountryName' => $this->input->post('CountryName'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		if ($data['CountryName'] != "") {
			$this->db->where('CountryID', $id);
			$this->db->update('L_CountryMst', $data);
			return true;
		} //$data['CountryName'] != ""
	}
	public function add_state() {
		$data  = array(
			'CountryID' => $this->input->post('CountryID'),
			'StateName' => $this->input->post('StateName'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT StateName FROM L_StateMst WHERE StateName = ? AND CountryID = ?";
		$query = $this->db->query($sql, array(
			$data['StateName'],
			$data['CountryID']
		));
		if (!is_null($data['StateName']) && $query->num_rows() == 0) {
			$this->db->insert('L_StateMst', $data);
			return "State Name Added Sucessfully";
		} //!is_null($data['StateName']) && $query->num_rows() == 0
		elseif (is_null($data['StateName'])) {
			return "";
		} //is_null($data['StateName'])
		else {
			return "State Name Already Exists";
		}
	}
	public function update_state($id) {
		$data = array(
			'StateName' => $this->input->post('StateName'),
			'CountryID' => $this->input->post('CountryID'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		if ($data['StateName'] != "") {
			$this->db->where('StateID', $id);
			$this->db->update('L_StateMst', $data);
			return true;
		} //$data['StateName'] != ""
	}
	public function add_district() {
		$data  = array(
			'CountryID' => $this->input->post('CountryID'),
			'StateID' => $this->input->post('StateID'),
			'DistrictName' => $this->input->post('DistrictName'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT DistrictName FROM L_DistrictMst WHERE DistrictName = ? AND StateID = ? AND CountryID = ?";
		$query = $this->db->query($sql, array(
			$data['DistrictName'],
			$data['StateID'],
			$data['CountryID']
		));
		if (!is_null($data['DistrictName']) && $query->num_rows() == 0) {
			$this->db->insert('L_DistrictMst', $data);
			return "District Name Added Sucessfully";
		} //!is_null($data['DistrictName']) && $query->num_rows() == 0
		elseif (is_null($data['DistrictName'])) {
			return "";
		} //is_null($data['DistrictName'])
		else {
			return "District Name Already Exists";
		}
	}
	public function update_district($id) {
		$data = array(
			'CountryID' => $this->input->post('CountryID'),
			'DistrictName' => $this->input->post('DistrictName'),
			'StateID' => $this->input->post('StateID'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		if ($data['DistrictName'] != "") {
			$this->db->where('DistrictID', $id);
			$this->db->update('L_DistrictMst', $data);
			return true;
		} //$data['DistrictName'] != ""
	}
	public function add_subdistrict() {
		$data  = array(
			'CountryID' => $this->input->post('CountryID'),
			'StateID' => $this->input->post('StateID'),
			'DistrictID' => $this->input->post('DistrictID'),
			'SubDistrictName' => $this->input->post('SubDistrictName'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT SubDistrictName FROM L_SubDistrictMst WHERE SubDistrictName = ? AND DistrictID = ? AND StateID = ? AND CountryID = ?";
		$query = $this->db->query($sql, array(
			$data['SubDistrictName'],
			$data['DistrictID'],
			$data['StateID'],
			$data['CountryID']
		));
		if (!is_null($data['SubDistrictName']) && $query->num_rows() == 0) {
			$this->db->insert('L_SubDistrictMst', $data);
			return "Subdistrict Name Added Sucessfully";
		} //!is_null($data['SubDistrictName']) && $query->num_rows() == 0
		elseif (is_null($data['SubDistrictName'])) {
			return "";
		} //is_null($data['SubDistrictName'])
		else {
			return "Subdistrict Name Already Exists";
		}
	}
	public function update_subdistrict($id) {
		$data = array(
			'SubDistrictName' => $this->input->post('SubDistrictName'),
			'DistrictID' => $this->input->post('DistrictID'),
			'StateID' => $this->input->post('StateID'),
			'CountryID' => $this->input->post('CountryID'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		if ($data['SubDistrictName'] != "") {
			$this->db->where('SubDistrictID', $id);
			$this->db->update('L_SubDistrictMst', $data);
			return true;
		} //$data['SubDistrictName'] != ""
	}
	public function add_city() {
		$data  = array(
			'CountryID' => $this->input->post('CountryID'),
			'StateID' => $this->input->post('StateID'),
			'DistrictID' => $this->input->post('DistrictID'),
			'SubDistrictID' => $this->input->post('SubDistrictID'),
			'CityName' => $this->input->post('CityName'),
			'Pincode' => $this->input->post('Pincode'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT CityName FROM L_CityMst WHERE CityName = ? AND SubDistrictID = ? AND DistrictID = ? AND StateID = ? AND CountryID = ?";
		$query = $this->db->query($sql, array(
			$data['CityName'],
			$data['SubDistrictID'],
			$data['DistrictID'],
			$data['StateID'],
			$data['CountryID']
		));
		if (!is_null($data['CityName']) && $query->num_rows() == 0) {
			$this->db->query("DROP TABLE IF EXISTS Pincode");
			$sql1  = "CREATE TEMPORARY TABLE IF NOT EXISTS Pincode as SELECT ct.Pincode, ct.CityName, sd.SubDistrictName, d.DistrictName, s.StateName, c.CountryName
					FROM L_CityMst ct
					INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID
					INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID
					INNER JOIN L_StateMst s on d.StateID=s.StateID
					INNER JOIN L_CountryMst c ON s.CountryID=c.CountryID WHERE ct.Pincode = ?";
			$mysql = "Select * from Pincode";
			$this->db->query($sql1, array(
				$data['Pincode']
			));
			$query1 = $this->db->query($mysql);
			if ($query1->num_rows() == 0) {
				$this->db->insert('L_CityMst', $data);
				return "City Name Added Sucessfully";
			} //$query1->num_rows() == 0
			else {
				$this->session->set_flashdata('Temp_City', $data);
				return array(
					$data,
					$query1
				);
			}
		} //!is_null($data['CityName']) && $query->num_rows() == 0
		else if (is_null($data['CityName'])) {
			return "";
		} //is_null($data['CityName'])
		else {
			return "City Name Already Exists";
		}
	}
	public function city_confirm() {
		$data = $this->session->flashdata('Temp_City');
		$this->db->insert('L_CityMst', $data);
		return "City Name Added Sucessfully";
	}
	public function update_city($id=null,$mypincode=null,$mycityname=null) {
		$data = array(
			'CityName' => $this->input->post('CityName'),
			'SubDistrictID' => $this->input->post('SubDistrictID'),
			'DistrictID' => $this->input->post('DistrictID'),
			'StateID' => $this->input->post('StateID'),
			'CountryID' => $this->input->post('CountryID'),
			'Pincode' => $this->input->post('Pincode'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
	if($data['CityName']=="") $data['CityName']=$mycityname;
		if($data['Pincode']=="") $data['Pincode']=$mypincode;
		if ($data['CountryID'] != "") {
			$this->db->where('CityID', $id);
			$this->db->update('L_CityMst', $data);
			return true;
		} //$data['CityName'] != ""
	}
	public function add_area() {
		$data   = array(
			'CountryID' => $this->input->post('CountryID'),
			'StateID' => $this->input->post('StateID'),
			'DistrictID' => $this->input->post('DistrictID'),
			'SubDistrictID' => $this->input->post('SubDistrictID'),
			'CityID' => $this->input->post('CityID'),
			'AreaName' => $this->input->post('AreaName'),
			'Pincode' => $this->input->post('Pincode'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$my1    = "SELECT AreaName FROM L_AreaMst WHERE AreaName = ? AND CityID = ? AND SubDistrictID = ? AND DistrictID = ? AND StateID = ? AND CountryID = ?";
		$query1 = $this->db->query($my1, array(
			$data['AreaName'],
			$data['CityID'],
			$data['SubDistrictID'],
			$data['DistrictID'],
			$data['StateID'],
			$data['CountryID']
		));
		if (!is_null($data['AreaName']) && $query1->num_rows() == 0) {
			$this->db->query("DROP TABLE IF EXISTS Pincode");
			$area = "CREATE TEMPORARY TABLE IF NOT EXISTS Pincode as SELECT a.Pincode, a.AreaName, ct.CityName, sd.SubDistrictName, d.DistrictName, s.StateName, c.CountryName
					FROM L_AreaMst a
					INNER JOIN L_CityMst ct on a.CityID=ct.CityID
					INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID
					INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID
					INNER JOIN L_StateMst s on d.StateID=s.StateID
					INNER JOIN L_CountryMst c ON s.CountryID=c.CountryID WHERE a.Pincode = ?";
			$city = "Insert Into Pincode (Pincode, CityName, SubDistrictName, DistrictName, StateName, CountryName)
					SELECT ct.Pincode, ct.CityName, sd.SubDistrictName, d.DistrictName, s.StateName, c.CountryName
					FROM L_CityMst ct
					INNER JOIN L_SubDistrictMst sd on ct.SubDistrictID=sd.SubDistrictID
					INNER JOIN L_DistrictMst d on sd.DistrictID=d.DistrictID
					INNER JOIN L_StateMst s on d.StateID=s.StateID
					INNER JOIN L_CountryMst c ON s.CountryID=c.CountryID WHERE ct.Pincode = ?";
			$my2  = "Select * from Pincode";
			$this->db->query($area, array(
				$data['Pincode']
			));
			$this->db->query($city, array(
				$data['Pincode']
			));
			$query2 = $this->db->query($my2);
			if ($query2->num_rows() > 0) {
				$this->session->set_flashdata('Temp_Area', $data);
				return array(
					$data,
					$query2
				);
			} //$query2->num_rows() > 0
			$this->db->insert('L_AreaMst', $data);
			return "Area Name Added Sucessfully";
		} //!is_null($data['AreaName']) && $query1->num_rows() == 0
		elseif (is_null($data['AreaName'])) {
			return "";
		} //is_null($data['AreaName'])
		else {
			return "Area Name Already Exists";
		}
	}
	public function area_confirm() {
		$data   = $this->session->flashdata('Temp_Area');
		$my3    = "SELECT * FROM L_CityMst WHERE CityID=? AND Pincode = ? ";
		$query3 = $this->db->query($my3, array(
			$data['CityID'],
			$data['Pincode']
		));
		if ($query3->num_rows() > 0) {
			$my4    = "UPDATE   L_CityMst SET Pincode = Null WHERE CityID = ? AND Pincode = ?";
			$query4 = $this->db->query($my4, array(
				$data['CityID'],
				$data['Pincode']
			));
		} //$query3->num_rows() > 0
		$this->db->insert('L_AreaMst', $data);
		return "Area Name Added Sucessfully";
	}
	public function update_area($id=null,$mypincode=null,$myareaname =null) {
		$data = array(
			'AreaName' => $this->input->post('AreaName'),
			'CityID' => $this->input->post('CityID'),
			'SubDistrictID' => $this->input->post('SubDistrictID'),
			'DistrictID' => $this->input->post('DistrictID'),
			'StateID' => $this->input->post('StateID'),
			'CountryID' => $this->input->post('CountryID'),
			'Pincode' => $this->input->post('Pincode'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		if($data['AreaName']=="") $data['AreaName']=$myareaname;
		if($data['Pincode']=="") $data['Pincode']=$mypincode;
		if ($data['CountryID'] != "") {
			$this->db->where('AreaID', $id);
			$this->db->update('L_AreaMst', $data);
			return true;
		} //$data['AreaName'] != ""
	}
	public function add_mservice() {
		$data  = array(
			'MServiceName' => $this->input->post('MServiceName'),
			'MDescription' => $this->input->post('MDescription'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT MServiceName FROM Service_Main WHERE MServiceName = ?";
		$query = $this->db->query($sql, array(
			$data['MServiceName']
		));
		if (!is_null($data['MServiceName']) && $query->num_rows() == 0) {
			$this->db->insert('Service_Main', $data);
			return "Main Service Name Added Sucessfully";
		} //!is_null($data['MServiceName']) && $query->num_rows() == 0
		elseif (is_null($data['MServiceName'])) {
			return "";
		} //is_null($data['MServiceName'])
		else {
			return "Main Service Name Already Exists";
		}
	}
	public function update_mservice($id, $mymservicename,$mydiscription) {
		$data = array(
			'MServiceName' => $this->input->post('MServiceName'),
			'MDescription' => $this->input->post('MDescription'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);		
		if ($data['MServiceName'] != "" | $data['MDescription'] != "" ){
			if ($data['MServiceName'] == Null) {
				$data['MServiceName'] = $mymservicename;
			}
			if ($data['MDescription'] == Null) {
				$data['MDescription'] = $mydiscription;
			}
			$this->db->where('MServiceID', $id);
			$this->db->update('Service_Main', $data);
			return true;
		} 
	}
	public function add_sservice() {
		$data  = array(
		'SServiceName' => $this->input->post('SServiceName'),
		'SDescription' => $this->input->post('SDescription'),
		'MServiceID'   => $this->input->post('MServiceID'),
			'ModifiedBy' => $this->session->userdata('account_id')
		);
		$sql   = "SELECT SServiceName FROM Service_Sub WHERE SServiceName = ?";
		$query = $this->db->query($sql, array(
				$data['SServiceName']
		));
		if (!is_null($data['SServiceName']) && $query->num_rows() == 0) {
				$this->db->insert('Service_Sub', $data);
				return "Sub Service Name Added Sucessfully";
		}
		elseif (is_null($data['SServiceName'])) {
				return "";
		}
		else {
				return "Sub Service Name Already Exists";
		}
	}
	public function update_sservice($id=null,$mysservicename,$mydiscription) {
		$data = array(
			'SServiceName' => $this->input->post('SServiceName'),
			'SDescription' => $this->input->post('SDescription'),
			'MServiceID' 	=> $this->input->post('MServiceID'),
			'ModifiedBy' => $this->session->userdata('account_id')			
		);
		if ($data['SServiceName'] != "" | $data['SDescription'] != "" ){
			if ($data['SServiceName'] == Null) {
				$data['SServiceName'] = $mysservicename;
			}
			if ($data['SDescription'] == Null) {
				$data['SDescription'] = $mydiscription;
			}
			$this->db->where('SServiceID', $id);
			$this->db->update('Service_Sub', $data);			
			return true;
	} 

	}
	
	
	
	public function getmaxspid() {
			$sql   = "SELECT max(SpID) as SpID  FROM Tele_ServiceProvider";
				$query = $this->db->query($sql);
				$row = $query->row();
				$result = $row->SpID;
				return $result;
	}

	public function getserviceproviderlistbyid($searchTerm = Null) {
		$sql   = "SELECT * FROM Tele_ServiceProvider WHERE BrandID Like '%$searchTerm%'";
		$query = $this->db->query($sql);
		return $query;
	}
	
		public function gettelecomlistbyid($TelecomID = Null) {
		$sql   = "SELECT t.ID, t.CircleID, t.CName, t.CType, t.Code, t.Basic_StateID,s.StateID, b.StateName as BasicState,s.StateName, d.DistrictName, sd.SubDistrictName, ct.CityName FROM Tele_TelecomCircle t LEFT JOIN L_StateMst b on t.Basic_StateID=b.StateID LEFT JOIN L_StateMst s on t.StateID=s.StateID LEFT JOIN L_DistrictMst d on t.DistrictID=d.DistrictID and s.StateID=d.StateID LEFT JOIN L_SubDistrictMst sd on t.SubDistrictID=sd.SubDistrictID and d.DistrictID=sd.DistrictID LEFT JOIN L_CityMst ct on t.CityID=ct.CityID and sd.SubDistrictID=ct.SubDistrictID where ID = '$TelecomID'  Order By t.CircleID,t.StateID,t.DistrictID,t.SubDistrictID";
		$query = $this->db->query($sql);
		return $query;
	}
	public function gettelecomlist($searchTerm = Null) {
		$sql   = "SELECT t.ID, t.CircleID, t.CName, t.CType, t.Code, b.StateName as BasicState, s.StateName, d.DistrictName, sd.SubDistrictName, ct.CityName FROM Tele_TelecomCircle t LEFT JOIN L_StateMst b on t.Basic_StateID=b.StateID LEFT JOIN L_StateMst s on t.StateID=s.StateID LEFT JOIN L_DistrictMst d on t.DistrictID=d.DistrictID and s.StateID=d.StateID LEFT JOIN L_SubDistrictMst sd on t.SubDistrictID=sd.SubDistrictID and d.DistrictID=sd.DistrictID LEFT JOIN L_CityMst ct on t.CityID=ct.CityID and sd.SubDistrictID=ct.SubDistrictID where ID Like '%$searchTerm%'  Order By t.ID";
		$query = $this->db->query($sql);
		
		return $query;
	}
	public function gettelecom($searchTerm = Null) {
		$sql   = "SELECT t.ID, t.CircleID,s.StateName, d.DistrictName, sd.SubDistrictName, ct.CityName FROM Tele_TelecomCircle t INNER JOIN L_StateMst b on t.Basic_StateID=b.StateID INNER JOIN L_StateMst s on t.StateID=s.StateID LEFT JOIN L_DistrictMst d on t.DistrictID=d.DistrictID and s.StateID=d.StateID INNER JOIN L_SubDistrictMst sd on t.SubDistrictID=sd.SubDistrictID and d.DistrictID=sd.DistrictID INNER JOIN L_CityMst ct on t.CityID=ct.CityID and sd.SubDistrictID=ct.SubDistrictID where CircleID Like '%$searchTerm%'  Order By t.CircleID,t.StateID,t.DistrictID,t.SubDistrictID";
		$query = $this->db->query($sql);
		if ($query->result()) {
			return $query;
		}
		else{
			return array();
		}
	}

	
	public function getserviceproviderrowbyid($id = null) {
		$sql   = "SELECT * FROM Tele_ServiceProvider WHERE BrandID =?";
		$query = $this->db->query($sql, array(
			$id
		));
		return $query;
	}
	public function getmobileserieslistbyid($searchTerm = Null) {
		$sql   = "SELECT m.MSeriesNo,m.MTechnology,t.CircleID,t.CName,b.BrandID,b.BrandName FROM Tele_MobileSeries m INNER JOIN Tele_TelecomCircle t on m.CircleID=t.CircleID INNER JOIN Tele_ServiceProvider b on m.BrandID=b.BrandID where MSeriesNo Like '%$searchTerm%' ORDER BY MSeriesNo ASC";
		$query = $this->db->query($sql);
		
		return $query;
	}
	public function add_ServiceProvider() {
		
		$data  = array(
			'BrandName' => $this->input->post('BrandName'),
			'Code' => $this->input->post('Code'),
			'ServiceProvider' => $this->input->post('ServiceProvider'),
			'Description' => $this->input->post('Description')
			
		);
		$sql1   = "SELECT ServiceProvider , SpID FROM Tele_ServiceProvider WHERE ServiceProvider = ?";
		$query1 = $this->db->query($sql1, array(
			$data['ServiceProvider']
		));
		
		if($query1->num_rows() != 0)
		{
			$row = $query1->row();
				$data['SpID'] = $row->SpID;
		} else{
			$data['SpID'] = $this->getmaxspid() + 1;
		}
		
		$sql   = "SELECT BrandName ,Code FROM Tele_ServiceProvider WHERE BrandName = ? OR Code = ?";
		$query = $this->db->query($sql, array(
			$data['BrandName'],
			$data['Code']

		));
		if (!is_null($data['BrandName']) && $query->num_rows() == 0) {
			
			$this->db->insert('Tele_ServiceProvider', $data);
			return "Brand Name Added Sucessfully";
		} 
		elseif (is_null($data['BrandName'])) {
			return "";
		} 
		else {
			return "Brand Name Name Already Exists";
		}
	}
	
	public function update_serviceprovide($id=null,$BrandName=null,$Code= null,$ServiceProvider= null ,$Description =null) {
			$data = array(
			
			'BrandName' => $this->input->post('BrandName'),
			'Code' => $this->input->post('Code'),
			'ServiceProvider' => $this->input->post('ServiceProvider'),
			'Description' => $this->input->post('Description')
		);


		$sql1   = "SELECT ServiceProvider , SpID FROM Tele_ServiceProvider WHERE ServiceProvider = ?";
		$query1 = $this->db->query($sql1, array(
			$data['ServiceProvider']
		));
		
		if($query1->num_rows() != 0)
		{
			$row = $query1->row();
				$data['SpID'] = $row->SpID;
		} else{
			$data['SpID'] = $this->getmaxspid() + 1;
		}
		
		if($data['BrandName'] != "" || $data['Code'] != "" ||$data['ServiceProvider'] != ""  ||$data['Description'] != "" ) {
		if($data['BrandName']=="") $data['BrandName']=$BrandName;
		if($data['Code']=="") $data['code']=$Code;
		if($data['ServiceProvider']=="") $data['ServiceProvider']=$ServiceProvider;
		if($data['Description']=="") $data['Description']=$Description;
		
			$this->db->where('BrandID', $id);
			$this->db->update('Tele_ServiceProvider', $data);
			
			return true;
		} 
	}
	public function getbrandnamelist($searchTerm = null) {
		$sql   = "SELECT * FROM Tele_ServiceProvider WHERE  BrandName Like '%$searchTerm%' order by BrandName asc ";
		$query = $this->db->query($sql);
		
		$results = array();
			if ($query->result()) {
				foreach ($query->result() as $brand) {
					$results[] = $brand->BrandName;
				}
				return $results;
			} 
			else
				return array();
		
	}
	public function getcodelist($searchTerm = null) {
		$sql   = "SELECT * FROM Tele_ServiceProvider WHERE  Code Like '%$searchTerm%' order by Code asc ";
		$query = $this->db->query($sql);
		
		$results = array();
			if ($query->result()) {
				foreach ($query->result() as $brand) {
					$results[] = $brand->Code;
				}
				return $results;
			} 
			else
				return array();
		
	}
	public function getserviceproviderlist($searchTerm = null) {
		$sql   = "SELECT DISTINCT ServiceProvider from Tele_ServiceProvider WHERE  ServiceProvider Like '%$searchTerm%' order by ServiceProvider asc ";
		$query = $this->db->query($sql);
		
		$results = array();
			if ($query->result()) {
				foreach ($query->result() as $brand) {
					$results[] = $brand->ServiceProvider;
				}
				return $results;
			} 
			else
				return array();
	}
	public function getmaxCircleID() {
			$sql   = "SELECT max(CircleID) as CircleID  FROM Tele_TelecomCircle";
				$query = $this->db->query($sql);
				$row = $query->row();
				$result = $row->CircleID;
				return $result;
	}
	public function add_telecom() {
		
		$data  = array(
			'CName' => $this->input->post('CName'),
			'CType' => $this->input->post('CType'),
			'Code' => $this->input->post('Code'),
			'Basic_StateID' => $this->input->post('Basic_StateID'),
			
		);


		$state = $this->input->post('my_state');
		$District = $this->input->post('my_district');
		$SubDistrictID = $this->input->post('my_subdistrict');
	    $CityID = $this->input->post('my_city');

		$sql   = "SELECT CName  FROM Tele_TelecomCircle WHERE CName = ?";
		$query = $this->db->query($sql, array(
			$data['CName'],
		));
		if($query->num_rows() != 0)
		{
			$row = $query->row();
				$data['CircleID'] = $row->CircleID;
		} else{
			$data['CircleID'] = $this->getmaxCircleID() + 1;
		}
		
		
		
		if (!is_null($data['CName']) && $query->num_rows() == 0) {

		foreach ($state as $key => $value ) {
				$data['StateID'] = $value;
				$data['DistrictID'] = $District[$key];
				$data['SubDistrictID'] = $SubDistrictID[$key];
				$data['CityID'] = $CityID[$key];

			$this->db->insert('Tele_TelecomCircle', $data);

			}


			return "Circle Name Added Sucessfully";
		} 
		elseif (is_null($data['CName'])) {
			return "";
		} 
		else {
			return "Circle Name Already Exists";
		}
	}

	public function update_telecom($id = null) {
		$data = array(
			'CircleID' => $this->input->post('CircleID'),
			'Basic_StateID' => $this->input->post('Basic_StateID'),
			'CName' => $this->input->post('CName'),
			'CType' => $this->input->post('CType'),
			'Code' => $this->input->post('Code')		
		);
		if ($data['CName'] != "" || $data['CType'] != "" || $data['Code'] != "" || $data['Basic_StateID'] != "") {
			$this->db->where('CircleID', $data['CircleID']);
			$this->db->update('Tele_TelecomCircle', $data);
		}
		
		
		$state = $this->input->post('my_state');
		$District = $this->input->post('my_district');
		$SubDistrictID = $this->input->post('my_subdistrict');
	    $CityID = $this->input->post('my_city');

		$sql   = "SELECT CName  FROM Tele_TelecomCircle WHERE CName = ?";
		$query = $this->db->query($sql, array(
			$data['CName'],
		));
		
		

		if($state){
		foreach ($state as $key => $value ) {
				$data['StateID'] = $value;
				$data['DistrictID'] = $District[$key];
				$data['SubDistrictID'] = $SubDistrictID[$key];
				$data['CityID'] = $CityID[$key];

			$this->db->insert('Tele_TelecomCircle', $data);

			
		}
}
		
		$data1 = array(
			'StateID' => $this->input->post('StateID')? $this->input->post('StateID'): -1,
			'DistrictID' => $this->input->post('DistrictID') ? $this->input->post('DistrictID'): -1,
			'SubDistrictID' => $this->input->post('SubDistrictID')? $this->input->post('SubDistrictID'): -1,
			'CityID' => $this->input->post('CityID')? $this->input->post('CityID'): -1
		);
		
		if ($data1['StateID'] != -1) {
			$this->db->where('ID', $id);
			$this->db->update('Tele_TelecomCircle', $data1);
			return true;
		}
		

	}
	function delete_telecom_id($id){
	$this->db->where('ID', $id);
	$this->db->delete('Tele_TelecomCircle');
									}

	public function gettelecomnamelist($searchTerm = null) {
		$sql   = "SELECT * FROM Tele_TelecomCircle WHERE  CName Like '%$searchTerm%' order by CName asc ";
		$query = $this->db->query($sql);
		
		$results = array();
			if ($query->result()) {
				foreach ($query->result() as $telecom) {
					$results[] = $telecom->CName;
				}
				return $results;
			} 
			else
				return array();
		
	}
	public function getstatelistnew() {
		$sql   = "SELECT * FROM L_StateMst order by StateName asc ";
		$query = $this->db->query($sql);
			$my_states = array();
			if ($query->result()) {
				foreach ($query->result() as $state) {
					$my_states[$state->StateID] = $state->StateName;
				} //$query->result() as $state
				return $my_states;
			} //$query->result()
			else {
				return array();
			}
		
	}
	public function add_mobileseries() {
		
		
		$data  = array(
			'MSeriesNo' => $this->input->post('MSeriesNo'),
			'MTechnology' => $this->input->post('MTechnology'),
			'CircleID' => $this->input->post('CircleID'),
			'BrandID' => $this->input->post('BrandID')
		
		);

		$sql   = "SELECT MSeriesNo FROM Tele_MobileSeries WHERE MSeriesNo = ? AND CircleID = ? AND BrandID = ?";
		$query = $this->db->query($sql, array(
			$data['MSeriesNo'],
			$data['CircleID'],
			$data['BrandID']
			
		));
		if (!is_null($data['MSeriesNo']) && $query->num_rows() == 0) {
			$this->db->insert('Tele_MobileSeries', $data);
			return "Mobile Series Added Sucessfully";
		} 
		elseif (is_null($data['MSeriesNo'])) {
			return "";
		} 
		else {
			return "Mobile Series NO Name Already Exists";
		}
	}
	public function update_mobileseries($MSeriesNo=null,$MTechnology= null,$CircleID= null,$BrandID= null) {
		
			$data = array(
			'MSeriesNo' => $this->input->post('MSeriesNo'),
			'MTechnology' => $this->input->post('MTechnology'),
			'CircleID' => $this->input->post('CircleID'),
			'BrandID' => $this->input->post('BrandID')
			
		);

		if($data['MSeriesNo'] != "" || $data['MTechnology'] != "" ||$data['CircleID'] != "" ||$data['BrandID'] != "") {
		if($data['MSeriesNo']=="") $data['MSeriesNo']=$MSeriesNo;
		if($data['MTechnology']=="") $data['MTechnology']=$MTechnology;
		if($data['CircleID']=="") $data['CircleID']=$CircleID;
		if($data['BrandID']=="") $data['BrandID']=$BrandID;
		
		$this->db->where('MSeriesNo',$MSeriesNo);
		$this->db->update('Tele_MobileSeries', $data);
			
			return true;
		} 
	}
	public function getBrandListByID($searchTerm = Null) {
		$sql   = "SELECT * FROM Tele_ServiceProvider WHERE BrandName Like '%$searchTerm%' order by BrandName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $brandname) {
					$results[$brandname->BrandID] = $brandname->BrandName;
				} 
				return $results;
			} 
			else
				return array();
		} 
		else
			return $query;
	}
	public function getstatelistTelecom($searchTerm = Null) {
		$sql   = "SELECT * FROM L_StateMst WHERE StateName Like '%$searchTerm%' order by StateName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $country) {
					$results[] = $StateName->StateName;
				} 
				return $results;
			} 
			else
				return array();
		} 
		else
			return $query;
	}
	public function getTeleTypeListByID($searchTerm = Null) {
		$sql   = "SELECT * FROM Tele_TelecomCircle order by CName asc";
		$query = $this->db->query($sql);
		if (!is_null($searchTerm)) {
			$results = array();
			if ($query->result()) {
				foreach ($query->result() as $teletype) {
					$results[$teletype->CircleID] = $teletype->CName;
				} 
				return $results;
			} 
			else
				return array();
		} 
		else
			return $query;
	}
	
	public function getseriesnolist($searchTerm = null) {
		$sql   = "SELECT * FROM Tele_MobileSeries WHERE  MSeriesNo Like '%$searchTerm%' order by MSeriesNo asc ";
		$query = $this->db->query($sql);
		
		$results = array();
			if ($query->result()) {
				foreach ($query->result() as $Mseriesno) {
					$results[] = $Mseriesno->MSeriesNo;
				}
				return $results;
			} 
			else
				return array();
		
	}
	public function getcircledistricts($districtid = null) {
		$sql   = "SELECT * FROM L_DistrictMst WHERE  DistrictID = ?";
		$query =  $this->db->query($sql,array(
							$districtid	));
		
		$row = $query->row();
		$result = null;
			if($row)
				$result = $row->DistrictName;
				return $result;
		
	}
	public function getcirclestate($circleid = null) {
		$sql   = "SELECT s.StateName FROM Tele_TelecomCircle t  INNER JOIN L_StateMst s on find_in_set(s.StateID,t.StateID) where CircleID = ?";
		$query =  $this->db->query($sql,array(
							$circleid	));
		$result = array();
		foreach ($query->result() as $row) { $result[] = $row->StateName;}
				return $result;
		
	}


}
?>
