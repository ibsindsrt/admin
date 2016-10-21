<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MobileSeries extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('masterdata');
		$this->load->helper("url");
		$this->load->helper('form');
	}
	public function index($page = Null, $dynamic_meta = Null) {
				$query1 = $this->masterdata->getmobileserieslistbyid();

		$data = array(
			'meta_title' =>  'Mobile Series',
			'meta_assets' => 'System-Configuration/Masters/Telecom/MobileSeries/MobileSeries',
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
			$content = 'System-Configuration/Masters/Telecom/MobileSeries/MobileSeries';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)
				
		
		$this->weblib->load('admin', $content, $data, TRUE);
	}
	
	public function Add() {
		
		$query1       = $this->masterdata->add_mobileseries();
		$query2       = $this->masterdata->getTeleTypeListByID();
		$query3      = $this->masterdata->getBrandListByID();
		$dynamic_meta = array(
			'a' => $query1,
			'b' => $query2,
			'c' => $query3,
			'meta_title' => 'Mobile Series | Add',
			'meta_assets' => 'System-Configuration/Masters/Telecom/MobileSeries/Add'
		);
		$this->index('System-Configuration/Masters/Telecom/MobileSeries/Add', $dynamic_meta);
	}
		
	public function Update($MSeriesNo = null) {
		if ($MSeriesNo == NULL)
			redirect('/System-Configuration/Masters/Telecom/MobileSeries/');
		else
			$query1 = $this->masterdata->getmobileserieslistbyid($MSeriesNo);
	
			foreach ($query1->result() as $list) 
				$brandname = $list->BrandName;
				$brandid = $list->BrandID;
		    $query2 = $this->masterdata->update_mobileseries($MSeriesNo,$list->MTechnology,$list->CircleID,$list->BrandID);
			$query3 = $this->masterdata->getTeleTypeListByID();
			$query4 = $this->masterdata->getBrandListByID();

			
		
		if ($query2) {
			redirect('/System-Configuration/Masters/Telecom/MobileSeries/');
		} //$query4
		else {
			$dynamic_meta = array(
				'meta_title' => 'Mobile Series | Update',
				'meta_assets' => 'System-Configuration/Masters/Telecom/MobileSeries/Update',
				'a' => $query1,
				'b' =>$query3,
				'c' =>$query4,
				'brandname' => $brandname,
				'brandid' => $brandid
			);
			$this->index('System-Configuration/Masters/Telecom/MobileSeries/Update', $dynamic_meta);
		}
	}
	
	
}
?>
