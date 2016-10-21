<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sysconfig extends MY_Controller {
		
	public function index($page = Null, $dynamic_meta = Null) {
		$data = array(
			'meta_title' => 'System Configuration',
			'meta_assets' => 'System-Configuration/System-Configuration'
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'System-Configuration/System-Configuration.php';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)              
		$this->weblib->load('admin', $content, $data, TRUE);
	}
}
?>
