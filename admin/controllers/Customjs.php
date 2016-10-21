<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customjs extends MY_Controller {
	public function getcountrylist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getcountrylist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getstatelist($country_id = Null) {
		$this->load->model('Masterdata');
		$country_id_recieved = $country_id ? $country_id : $_GET['country_id'];
		$searchTerm          = $country_id ? Null : $_GET['term'];
		$result              = $this->Masterdata->getstatelist($country_id_recieved, $searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getdistrictlist($state_id = Null) {
		$this->load->model('Masterdata');
		$state_id_recieved = $state_id ? $state_id : $_GET['state_id'];
		$searchTerm        = $state_id ? Null : $_GET['term'];
		$result            = $this->Masterdata->getdistrictlist($state_id_recieved, $searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	public function getsubdistrictlist($district_id = Null) {
		$this->load->model('Masterdata');
		$district_id_recieved = $district_id ? $district_id : $_GET['district_id'];
		$searchTerm           = $district_id ? Null : $_GET['term'];
		$result               = $this->Masterdata->getsubdistrictlist($district_id_recieved, $searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	public function getcitylist($subdistrict_id = Null) {
		$this->load->model('Masterdata');
		$subdistrict_id_recieved = $subdistrict_id ? $subdistrict_id : $_GET['subdistrict_id'];
		$searchTerm              = $subdistrict_id ? Null : $_GET['term'];
		$result                  = $this->Masterdata->getcitylist($subdistrict_id_recieved, $searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getcitypincodelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getcitypincodelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
		
	public function getarealist($city_id = Null) {
		$this->load->model('Masterdata');
		$city_id_recieved = $city_id ? $city_id : $_GET['city_id'];
		$searchTerm       = $city_id ? Null : $_GET['term'];
		$result           = $this->Masterdata->getarealist($city_id_recieved, $searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getareapincodelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getareapincodelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	public function getmservicelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getmservicelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getsservicelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getsservicelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	public function getbrandnamelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getbrandnamelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	public function getcodelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getcodelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	public function getserviceproviderlist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->getserviceproviderlist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		

	}
	public function getseriesnolist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$searchTerm =str_replace("X","",$searchTerm);
		$result     = $this->Masterdata->getseriesnolist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	
	public function gettelecomnamelist() {
		$this->load->model('Masterdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Masterdata->gettelecomnamelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	
	public function getbanknamelist() {
		$this->load->model('Accountdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Accountdata->getbanknamelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	public function getbankacnamelist() {
		$this->load->model('Accountdata');
		$searchTerm = $_GET['term'];
		$result     = $this->Accountdata->getbankacnamelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		
	}
	public function getDefaultservice($ID = null,$DefaultService=null) {
		$this->load->model('Accountdata');
				$result = $this->Accountdata->getDefaultservice($ID,$DefaultService);
				header('Content-Type: application/x-json; charset=utf-8');
				echo json_encode($result);
	}
	public function getStatusservice($ID = null,$Status =null) {
		$this->load->model('Accountdata');
				$result = $this->Accountdata->getStatusservice($ID,$Status);
				header('Content-Type: application/x-json; charset=utf-8');
				echo json_encode($result);
	}
	public function getServicelist($MService_ID = Null) {
		$this->load->model('Accountdata');
		$result  = $this->Accountdata->getServicelist($MService_ID);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	
	public function getpackagenamelist() {
		$this->load->model('Accountdata');
		$searchTerm = $_GET['term'];
		$result = $this->Accountdata->getpackagenamelist($searchTerm);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
		}
	
	public function getpackagelist($P_ID = Null, $sid = null) {
		$this->load->model('Accountdata');
		$result  = $this->Accountdata->getpackagelist($P_ID,$sid);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	public function getsmpboxpackage() {
		$this->load->model('Accountdata');
		$result  = $this->Accountdata->getsmpboxpackage();
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($result);
	}
	
	public function getpackageMapping($PakageID = null,$status=null) {
		$this->load->model('Accountdata');
				$result = $this->Accountdata->getpackageMapping($PakageID,$status);
				header('Content-Type: application/x-json; charset=utf-8');
				echo json_encode($result);
	}
	
	public function ChangeRemap() {
		$this->load->model('Accountdata');
				$remap = $_POST['remape'];
				$result = $this->Accountdata->ChangeRemap($remap);
				header('Content-Type: application/x-json; charset=utf-8');
				echo json_encode($result);
	}
	
	
	
}
?>
