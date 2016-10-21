<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MService extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page = Null, $dynamic_meta = Null) {
		$query1 = $this->masterdata->getmservicelistbyid();
		$data   = array(
			'meta_title' => 'Main Service',
			'meta_assets' => 'System-Configuration/Masters/Services/MService/MService',
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
			$content = 'System-Configuration/Masters/Services/MService/MService';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	public function Add() {
		$query1       = $this->masterdata->add_mservice();
		$dynamic_meta = array(
			'meta_title' => 'Main Service | Add',
			'meta_assets' => 'System-Configuration/Masters/Services/MService/Add',
			'a' => $query1
			
		);
		$this->index('System-Configuration/Masters/Services/MService/Add', $dynamic_meta);
	}
	public function Update($MServiceID = null) {
		if ($MServiceID == NULL)
			redirect('/System-Configuration/Masters/Services/Main_Service/ ');
		else
			$query1 = $this->masterdata->getmservicerowbyid($MServiceID);
		foreach ($query1->result() as $list)
			$query2 = $this->masterdata->update_mservice($MServiceID, $list->MServiceName, $list->MDescription);
		if ($query2) {
			redirect('/System-Configuration/Masters/Services/MService/ ');
		} //$query2
		else {
			$dynamic_meta = array(
				'meta_title' => 'Main Service | Update',
				'a' => $query1
			);
			$this->index('System-Configuration/Masters/Services/MService/Update', $dynamic_meta);
		}
	}
}
?>