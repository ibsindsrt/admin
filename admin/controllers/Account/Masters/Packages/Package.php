<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Accountdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->Accountdata->getpackagelistbyid();			
			$data = array(
			'meta_assets' => 'Account/Masters/Packages/Package',
			'meta_title' => 'Package',
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
			$content = 'Account/Masters/Packages/Package';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	public function Add() {
		$query1       = $this->Accountdata->getMainserviceName();
		
		$query3       = $this->Accountdata->add_packages();
		$query5 	  = $this->Accountdata->getallpackagename();
		
		$dynamic_meta = array(
			'meta_title' => 'Packages | Add ',
			'a' => $query1,
			
			'c' => $query3,
			'e' => $query5,
			
			'meta_assets' => 'Account/Masters/Packages/Add'
		);
		$this->index('Account/Masters/Packages/Add', $dynamic_meta);
	}
	
		public function Update($PakageID  = null) {
		if ($PakageID  == NULL)
			redirect('/Account/Masters/Packages/Package/');
		else
		$query1 = $this->Accountdata->getpackagelistbyid($PakageID);
		$list = $query1->row();
		$query2 = $this->Accountdata->getMainserviceName();
		$query3 = $this->Accountdata->getpackageID($PakageID);
		$query4 = $this->Accountdata->getPackageformultiple($PakageID);
		$query5 = $this->Accountdata->getboxname($PakageID);
		$result = $this->Accountdata->update_package($PakageID,$list->PType,$list->PName,$list->PDescription,$list->Credits,$list->Cost_Per,$list->Validity);
		if ($result) {
			redirect('/Account/Masters/Packages/Package/');
		}
		else {
			$dynamic_meta = array(
				'meta_title' => 'Package| Update',
				'meta_assets' => 'Account/Masters/Packages/Update',
				'a' => $query1,
				'c' => $query2,
				'g' => $query3,
				'BoxName' => $query5,
				'PackageRecieved' => $query4,
				'PTypegot'	=> $list->PType
				
			);
			$this->index('Account/Masters/Packages/Update', $dynamic_meta);
		}
	}
	
	
	
	
	
	
	
	}
?>