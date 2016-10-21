<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends MY_Controller {
	public function index($page = Null, $dynamic_meta = Null) {
		$data = array(
			'meta_title' => 'Admin Login',
			'meta_keywords' => '| Bulk SMS | Voice Calls | Email Marketing |',
			'meta_description' => 'Infinity Business Solutions an Indian company located in Surat offers Marketing Solutions like Bulk SMS, Voice Call, Online Marketing & Email Marketing, Creative Solutions like Website Designing & Development & Branding.',
			'meta_assets' => 'Account/Account'
		);
		if (!is_null($page) && !is_null($dynamic_meta)) {
			$content = $page;
			$meta    = $dynamic_meta;
		} //!is_null($page) && !is_null($dynamic_meta)
		else if (!is_null($page)) {
			$content = $page;
		} //!is_null($page)
		else {
			$content = 'Account/Account.php';
		}
		if (!is_null($dynamic_meta)) {
			$data = array_merge($data, $meta);
		} //!is_null($dynamic_meta)              
		$this->weblib->load('admin', $content, $data, TRUE);
	}
}
?>
