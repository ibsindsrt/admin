<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Accountdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->Accountdata->getBankInfoByID();			
			$data = array(
			'meta_assets' => 'Account/Masters/Bank/Bank',
			'meta_title' => 'Bank',
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
			$content = 'Account/Masters/Bank/Bank';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	
	
	public function Add() {
		
		$query1     = $this->Accountdata->add_BankInfo();

		$dynamic_meta = array(
			'meta_title' => 'Bank| Add ',
			'a' => $query1,
			'meta_assets' => 'Account/Masters/Bank/Add'
		);
		$this->index('Account/Masters/Bank/Add', $dynamic_meta);
	}
	
	public function Update($ID  = null) {
		if ($ID  == NULL)
			redirect('/Account/Masters/Bank/Bank/');
		else
		$query1 = $this->Accountdata->getBankInfoByID($ID);
			foreach ($query1->result() as $list)

		$query2= $this->Accountdata->update_BankInfo($ID,$list->BName,$list->AcName,$list->AcNo,$list->Branch,$list->IFCCode);
		if ($query2) {
			redirect('/Account/Masters/Bank/Bank');
		} //$query2
		else {
			$dynamic_meta = array(
				'meta_title' => 'Bank| Update',
				'meta_assets' => 'Account/Masters/Bank/Update',
				'a' => $query1,
				
				
			);
			$this->index('Account/Masters/Bank/Update',$dynamic_meta);
		}
	}
	
	function Delete1($id) {
	
			$query1    = $this->Accountdata->delete_BankInfo($id);
		
		$dynamic_meta = array(
			'meta_title' => 'Bank',
			'meta_assets' => 'Account/Masters/Bank/Bank',
		);
		$this->index('/Account/Masters/Bank/Bank', $dynamic_meta);
		
			
	
}
	
	
	
	}
?>