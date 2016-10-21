<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ServiceTax extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Accountdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->Accountdata->getservicetaxrowbyid();			
			$data = array(
			'meta_assets' => 'Account/Masters/ServiceTax/ServiceTax',
			'meta_title' => 'ServiceTax',
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
			$content = 'Account/Masters/ServiceTax/ServiceTax';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	
	
	public function Add() {
		
		$query1     = $this->Accountdata->add_ServiceTax();

		$dynamic_meta = array(
			'meta_title' => 'ServiceTax | Add ',
			'a' => $query1,
			
			'meta_assets' => 'Account/Masters/ServiceTax/Add'
		);
		$this->index('Account/Masters/ServiceTax/Add', $dynamic_meta);
	}
	
	public function Update($ID  = null) {
		if ($ID  == NULL)
			redirect('/Account/Masters/ServiceTax/ServiceTax/');
		else
		$query1 = $this->Accountdata->getservicetaxrowbyid($ID);
	foreach ($query1->result() as $list)

		$query2= $this->Accountdata->update_ServiceTax($ID,$list->ApplyFrom,$list->ServiceTax);
		if ($query2) {
			redirect('/Account/Masters/ServiceTax/ServiceTax');
		} //$query2
		else {
			$dynamic_meta = array(
				'meta_title' => 'ServiceTax| Update',
				'meta_assets' => 'Account/Masters/ServiceTax/Update',
				'a' => $query1,
				
				
			);
			$this->index('Account/Masters/ServiceTax/Update', $dynamic_meta);
		}
	}
	
	
	
	}
?>