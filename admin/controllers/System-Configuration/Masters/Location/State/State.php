<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class State extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
	}		
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->masterdata->getstatelistbyid();
			$data = array(
			'a' => $query1,
			'meta_title' => 'State',					
			'meta_assets' => 'System-Configuration/Masters/Location/State/State'					
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'System-Configuration/Masters/Location/State/State';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	public function Add() {
		$query1       = $this->masterdata->add_state();
		$query2       = $this->masterdata->getcountrylist();
		$dynamic_meta = array(
			'a' => $query1,
			'b' => $query2,
			'meta_title' => 'State | Add',
			'meta_assets' => 'System-Configuration/Masters/Location/State/Add'
		);
		$this->index('System-Configuration/Masters/Location/State/Add', $dynamic_meta);
	}
	public function Update($StateID = null) {
		if ($StateID == NULL)
			redirect('System-Configuration/Masters/Location/State');
		else
			$query1 = $this->masterdata->getstaterowbyid($StateID);			
		$query2 = $this->masterdata->getcountrylist();
		$query3 = $this->masterdata->update_state($StateID);
		if ($query3) {
			redirect('System-Configuration/Masters/Location/State');
		} //$query3
		else {
			$dynamic_meta = array(
				'a' => $query1,
				'b' => $query2,
				'meta_title' => 'State | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/State/Update'						
			);
			$this->index('System-Configuration/Masters/Location/State/Update', $dynamic_meta);
		}
	}
	
}
?>
