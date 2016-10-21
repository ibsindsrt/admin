<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SService extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page = Null, $dynamic_meta = Null) {
		$query1       = $this->masterdata->getsservicelistbyid();
		$data = array(
			
			'meta_assets' => 'System-Configuration/Masters/Services/SService/SService',
			'meta_title' => 'Sub Service',
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
			$content = 'System-Configuration/Masters/Services/SService/SService';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
				
		
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	public function Add() {
		$query1       = $this->masterdata->add_sservice();
				$query2       = $this->masterdata->getmservicelist();
				$dynamic_meta = array(
						'meta_title' => 'Sub Service | Add',
						'a' => $query1,
						'b' => $query2,
						'meta_assets' => 'System-Configuration/Masters/Services/SService/Add'
				);
				$this->index('System-Configuration/Masters/Services/SService/Add', $dynamic_meta);
	}

	public function Update($SServiceID = null) {
		if ($SServiceID == NULL)
			redirect('/System-Configuration/Masters/Services/SService/ ');
		else
			$query1 = $this->masterdata->getsservicerowbyid($SServiceID);
										foreach ($query1->result() as $list)

			$query2 = $this->masterdata->getmservicelistbyid();
		    $query3 = $this->masterdata->update_sservice($SServiceID,$list->SServiceName,$list->SDescription);	
										
		if ($query3) {
			redirect('/System-Configuration/Masters/Services/SService/ ');
		} //$query3
		else {
			$dynamic_meta = array(
				'meta_title' => 'Sub Service | Update',
				'meta_assets' => 'System-Configuration/Masters/Services/SService/Update',
				'a' => $query1,
				'b' => $query2
			);
			$this->index('System-Configuration/Masters/Services/SService/Update', $dynamic_meta);
		}
	}
}
?>
