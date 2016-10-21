<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Area extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');	
	}	
	
	public function index($page=NULL, $dynamic_meta=NULL) {
			$query1       = $this->masterdata->getarealistbyid();			
			$data = array(
			'meta_assets' => 'System-Configuration/Masters/Location/Area/Area',
			'meta_title' => 'Area',
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
			$content = 'System-Configuration/Masters/Location/Area/Area';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
		$this->weblib->load('admin', $content, $data, TRUE);
	}

	
	public function Add() {
		$query1 = $this->masterdata->add_area();
		if (gettype($query1) == "string") {
			$query2       = $this->masterdata->getcountrylist();
			$dynamic_meta = array(
				'a' => $query1,
				'b' => $query2,
				'meta_title' => 'Area | Add ',
				'meta_assets' => 'System-Configuration/Masters/Location/Area/Add'
			);
			$this->index('System-Configuration/Masters/Location/Area/Add', $dynamic_meta);
		} 
		else {
			$dynamic_meta = array(
				'c' => $query1[1],
				'd' => $query1[0],
				'meta_title' => 'Area | Add',
				'meta_assets' => 'System-Configuration/Masters/Location/Area/Add'
			);
			$this->index('System-Configuration/Masters/Location/Area/Area_Popup', $dynamic_meta);
		}
	}
	public function Area_Confirmation($yes = null) {
		if (!is_null($yes)) {
			$this->masterdata->area_confirm();
		} //!is_null($yes)
		redirect('/System-Configuration/Masters/Location/Area/Add/');
	}
	public function Update($AreaID = null) {
		if ($AreaID == NULL)
			redirect('System-Configuration/Masters/Location/Area');
		else
			$query1 = $this->masterdata->getarearowbyid($AreaID);
				foreach ($query1->result() as $list)
			$query2 = $this->masterdata->getcountrylist();
			$query3 = $this->masterdata->update_area($AreaID,$list->Pincode,$list->AreaName);
		if ($query3) {
			redirect('System-Configuration/Masters/Location/Area');
		} //$query3
		else {
			$dynamic_meta = array(
				'meta_title' => 'Area | Update',
				'meta_assets' => 'System-Configuration/Masters/Location/Area/Add',
				'a' => $query1,
				'b' => $query2				
			);
			$this->index('System-Configuration/Masters/Location/Area/Update', $dynamic_meta);
		}
	}

}
?>
