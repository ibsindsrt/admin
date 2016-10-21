<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ServiceProvider extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page = Null, $dynamic_meta = Null) {
		$query1       = $this->masterdata->getserviceproviderlistbyid();
		$data = array(
			'meta_title' => 'Service Provider',
			'meta_assets' => 'System-Configuration/Masters/Telecom/ServiceProvider/ServiceProvider',
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
			$content = 'System-Configuration/Masters/Telecom/ServiceProvider/ServiceProvider';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
				
		
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	
	public function Add() {
		$query1       = $this->masterdata->add_ServiceProvider();
		$dynamic_meta = array(
			'meta_title' => 'Service Provider | Add',
			'a' => $query1,
			'meta_assets' => 'System-Configuration/Masters/Telecom/ServiceProvider/Add'
		);
		$this->index('System-Configuration/Masters/Telecom/ServiceProvider/Add', $dynamic_meta);
	}
	public function Update($BrandID = null) {
		if ($BrandID == NULL)
			redirect('/System-Configuration/Masters/Telecom/ServiceProvider/');
		else
			$query1 = $this->masterdata->getserviceproviderrowbyid($BrandID);
			foreach ($query1->result() as $list) 
			
		    $query2 = $this->masterdata->update_serviceprovide($BrandID,$list->BrandName,$list->Code,$list->ServiceProvider,$list->Description);
			
			$query1 = $this->masterdata->getserviceproviderrowbyid($BrandID);
		if ($query2) {
			redirect('/System-Configuration/Masters/Telecom/ServiceProvider/');
		} //$query4
		else {
			$dynamic_meta = array(
				'meta_title' => 'Service Provider | Update',
				'meta_assets' => 'System-Configuration/Masters/Telecom/ServiceProvider/Update',
				'a' => $query1,
				
			);
			$this->index('System-Configuration/Masters/Telecom/ServiceProvider/Update', $dynamic_meta);
		}
	}

	
	
	
	

}
?>
