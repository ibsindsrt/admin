<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubDistrict extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');	
	}	
	
	public function index($page=NULL, $dynamic_meta=NULL) {
		$query1       = $this->masterdata->getsubdistrictlistbyid();			
			$data = array(
			'meta_assets' => 'System-Configuration/Masters/Location/SubDistrict/SubDistrict',
			'meta_title' => 'Sub District',
			'a' => $query1
		
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'System-Configuration/Masters/Location/SubDistrict/SubDistrict';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	public function Add() {
		$query1       = $this->masterdata->add_subdistrict();
		$query2       = $this->masterdata->getcountrylist();
		$dynamic_meta = array(
			'a' => $query1,
			'b' => $query2,
			'meta_title' => 'Sub District | Add',
			'meta_assets' => 'System-Configuration/Masters/Location/SubDistrict/Add'
		);
		$this->index('System-Configuration/Masters/Location/SubDistrict/Add', $dynamic_meta);
	}
	public function Update($SubDistrictID = null) {
		if ($SubDistrictID == NULL)
			redirect('System-Configuration/Masters/Location/SubDistrict');
		else
		$query1 = $this->masterdata->getsubdistrictrowbyid($SubDistrictID);			
		$query2 = $this->masterdata->getcountrylist();		
		$query3 = $this->masterdata->update_subdistrict($SubDistrictID);
		if ($query3) {
			redirect('System-Configuration/Masters/Location/SubDistrict');
		} //$query3
		else {
			$dynamic_meta = array(
				'meta_title' => 'District | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/SubDistrict/Update',
				'a' => $query1,
				'b' => $query2				
			);
			$this->index('System-Configuration/Masters/Location/SubDistrict/Update', $dynamic_meta);
		}
	}
	
}
?>
