<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class City extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');	
	}	
	
	public function index($page=NULL, $dynamic_meta=NULL) {
				
			$data = array(
			'meta_assets' => 'System-Configuration/Masters/Location/City/City',
			'meta_title' => 'City',

		
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'System-Configuration/Masters/Location/City/City';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	
	
	public function Add() {
		$query1 = $this->masterdata->add_city();
		if (gettype($query1) == "string") {
			$query2       = $this->masterdata->getcountrylist();
			$dynamic_meta = array(
				'a' => $query1,
				'b' => $query2,
				'meta_title' => 'City | Add',
				'meta_assets' => 'System-Configuration/Masters/Location/City/Add'
			);
			$this->index('System-Configuration/Masters/Location/City/Add', $dynamic_meta);
		} //gettype($query1) == "string"
		else {
			$dynamic_meta = array(
				'c' => $query1[1],
				'd' => $query1[0],
				'meta_title' => 'City | Add',
				'meta_assets' => 'default'
			);
			$this->index('System-Configuration/Masters/Location/City/City_Popup', $dynamic_meta);
		}
	}
	public function City_Confirmation($yes = null) {
		if (!is_null($yes)) {
			$this->masterdata->city_confirm();
		} //!is_null($yes)
		redirect('/System-Configuration/Masters/Location/City/Add/');
	}
	public function Update($CityID = null) {
		if ($CityID == NULL)
			redirect('System-Configuration/Masters/Location/City/');
		else
		$query1 = $this->masterdata->getcityrowbyid($CityID);
			foreach ($query1->result() as $list) 
		$query2 = $this->masterdata->getcountrylist();		
		$query3 = $this->masterdata->update_city($CityID,$list->Pincode,$list->CityName);
		if ($query3) {
			redirect('System-Configuration/Masters/Location/City/');
		} //$query3
		else {
			$dynamic_meta = array(
				'meta_title' => 'City | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/City/Update',
				'a' => $query1,
				'b' => $query2			
			);
			$this->index('System-Configuration/Masters/Location/City/Update', $dynamic_meta);
		}
	}

}
?>
