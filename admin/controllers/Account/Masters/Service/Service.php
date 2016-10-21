<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Accountdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->Accountdata->getservicesmmp();
			$data = array(
			'meta_assets' => 'Account/Masters/Service/service',
			'meta_title' => 'Service',
			'a' => $query1,
		
		);
		
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'Account/Masters/Service/service';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	
		public function Add() {
			
		$query3 = $this->Accountdata->add_ServiceSmp();
		$query2 = $this->Accountdata->getsmmpboxName();		
		$query1 = $this->Accountdata->getSubServiceName();
		$query4 = $this->Accountdata->getpakageforservice();
		
	
		$dynamic_meta = array(
			'meta_title' => 'Service| Add ',
			'a' => $query1,
			'b' => $query2,
			'e' => $query4,
			'c' => $query3,
			'meta_assets' => 'Account/Masters/Service/Add'
		);
		$this->index('Account/Masters/Service/Add', $dynamic_meta);
	}
	
		public function Update($ID  = null) {
		if ($ID  == NULL)
			redirect('/Account/Masters/Service/service/');
		else
		$query1 = $this->Accountdata->getservicesmmpbyid($ID);
	
			foreach ($query1->result() as $list)	
			
		$query2= $this->Accountdata->getservicesmmp($ID);
			
		$query4 = $this->Accountdata->getsmmpboxName();
		$query5 = $this->Accountdata->getpakageforservice();
		$query3 = $this->Accountdata->update_Serviceformapping($ID,$list->SServiceID,$list->BoxID,$list->PakageID);
		if ($query3) {
			redirect('/Account/Masters/Service/service/');
		} //$query2
		else {
			$dynamic_meta = array(
				'meta_title' => 'Package| Update',
				'a' => $query1,
				'b' => $query2,
				'c' => $query4,
				'e' =>$query5,
				'meta_assets' => 'Account/Masters/Service/Update'
								
			);
			$this->index('Account/Masters/Service/Update', $dynamic_meta);
		}
	}
	
	function Delete1($id) {

	  $query1       = $this->Accountdata->deleteSmmpservice($id);
	  $query2      = $this->Accountdata->getservicesmmpbyid($id);
	
		$dynamic_meta = array(
			'meta_title' => 'Service',
			'meta_assets' => 'Account/Masters/Service/Service'
		);
		$this->index('Account/Masters/Service/service', $dynamic_meta);

	}
	
	
	}
?>