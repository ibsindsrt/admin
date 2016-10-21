<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Circle extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
	}
	public function index($page = Null, $dynamic_meta = Null) {
		$query1 = $this->masterdata->gettelecomlist();
		$data = array(
			'meta_title' => 'Telecom Circle',
			'meta_assets' => 'System-Configuration/Masters/Telecom/Circle/Circle',
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
			$content = 'System-Configuration/Masters/Telecom/Circle/Circle';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
				
		
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	public function Add() {
		$query1       = $this->masterdata->add_telecom();
		$query2       = $this->masterdata->getstatelistTelecom();
		$dynamic_meta = array(
			'a' => $query1,
			'b' => $query2,
			'meta_title' => 'Telecom Circle | Add',
			'meta_assets' => 'System-Configuration/Masters/Telecom/Circle/Add'
		);
		$this->index('System-Configuration/Masters/Telecom/Circle/Add', $dynamic_meta);
	}
	public function Update($TelecomID = null) {
		if ($TelecomID == NULL)
			redirect('/System-Configuration/Masters/Telecom/Circle/');
		else
		$query1 = $this->masterdata->gettelecomlistbyid($TelecomID);
			$query4 = $this->masterdata->gettelecom($TelecomID);

			foreach ($query1->result() as $list)
			
		$query2 = $this->masterdata->update_telecom($TelecomID);
		$query3 =$this->masterdata->getstatelistTelecom();
		if ($query2) {
			redirect('/System-Configuration/Masters/Telecom/Circle/');
		}
		else {
			$dynamic_meta = array(
				'meta_title' => 'Telecom Circle | Update',
				'meta_assets' => 'System-Configuration/Masters/Telecom/Circle/Update',
				'a' => $query1,
				'b' =>$query3,
				'my_state' => $query4
			);			
			$this->index('System-Configuration/Masters/Telecom/Circle/Update', $dynamic_meta);
		}
	}	
	function delete_telecom_id($id) {
	
	
	$query1       = $this->masterdata->delete_telecom_id($id);
		
		$dynamic_meta = array(
							'meta_title' => 'Telecom Circle | Update',
							'meta_assets' => 'System-Configuration/Masters/Telecom/Circle/Circle',
		);
		$this->index('System-Configuration/Masters/Telecom/Circle/Circle', $dynamic_meta);
		
			
	
}
}
?>