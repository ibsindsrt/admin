<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Country extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
	}	
	
	public function index($page=NULL, $dynamic_meta=NULL) {
		$query1       = $this->masterdata->getcountrylistbyid();
			$data = array(
			'meta_title' => 'Country',
			'meta_assets' => 'System-Configuration/Masters/Location/Country/Country',
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
			$content = 'System-Configuration/Masters/Location/Country/Country';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	
	public function Add() {
		$query1       = $this->masterdata->add_country();
		$dynamic_meta = array(
			'meta_title' => 'Country | Add',
			'a' => $query1,
			'meta_assets' => 'System-Configuration/Masters/Location/Country/Add'
		);
		$this->index('System-Configuration/Masters/Location/Country/Add', $dynamic_meta);
	}
	public function Update($CountryID = null) {
		if ($CountryID == NULL)
			redirect('/System-Configuration/Masters/Location/Country/');
		else
		$query1 = $this->masterdata->getcountryrowbyid($CountryID);
		$query2 = $this->masterdata->update_country($CountryID);
		if ($query2) {
			redirect('/System-Configuration/Masters/Location/Country/');
		} //$query2
		else {
			$dynamic_meta = array(
				'meta_title' => 'Country | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/Country/Update',
				'a' => $query1
			);
			$this->index('System-Configuration/Masters/Location/Country/Update', $dynamic_meta);
		}
	}
}
?>
