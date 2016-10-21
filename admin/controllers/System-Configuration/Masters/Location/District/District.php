<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		}	
	
	public function index($page=NULL, $dynamic_meta=NULL) {
		$query1       = $this->masterdata->getdistrictlistbyid();			
			$data = array(
			'a' => $query1,			
			'meta_title' => 'District',
			'meta_assets' => 'System-Configuration/Masters/Location/District/District'		
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'System-Configuration/Masters/Location/District/District';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	public function Add() {
		$query1       = $this->masterdata->add_district();
		$query2       = $this->masterdata->getcountrylist();
		$dynamic_meta = array(
			'a' => $query1,
			'b' => $query2,
			'meta_title' => 'District | Add',
			'meta_assets' => 'System-Configuration/Masters/Location/District/Add'
		);
		$this->index('System-Configuration/Masters/Location/District/Add', $dynamic_meta);
	}
	public function Update($DistrictID = null) {
		if ($DistrictID == NULL)
			redirect('System-Configuration/Masters/Location/District');
		else
		$query1 = $this->masterdata->getdistrictrowbyid($DistrictID);
		$query2 = $this->masterdata->getcountrylist();
		
		$query3 = $this->masterdata->update_district($DistrictID);
		if ($query3) {
			redirect('System-Configuration/Masters/Location/District');
		} 
		else {
			$dynamic_meta = array(
				'a' => $query1,
				'b' => $query2,
				'meta_title' => 'District | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/District/Update'							
			);
			$this->index('System-Configuration/Masters/Location/District/Update', $dynamic_meta);
		}
	}
	
}
?>
