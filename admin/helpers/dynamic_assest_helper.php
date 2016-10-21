<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
function loadView($view) {
	$CI = get_instance();
	return $CI->load->view('master/' . $view);
}
if (!function_exists('dynamic_css')) {
	function dynamic_css($file) {	
	if (strpos($file, '/') !== false) {
		$cssname = substr($file, (strrpos($file,'/') + 1));}
	else
		$cssname = $file;	
		if (file_exists(APPPATH . 'views/master/css/' . $cssname . '.php'))
				loadView('css/' . $cssname, TRUE);
			else
				loadView('css/' . 'default', TRUE);		
	}	
} //!function_exists('dynamic_css')
if (!function_exists('dynamic_js')) {
	function dynamic_js($file) { {
			if (file_exists(APPPATH . 'views/master/js/' . $file . '.php'))
				loadView('js/' . $file, TRUE);
			else
				loadView('js/' . 'default', TRUE);
		}
	}
} //!function_exists('dynamic_js')
if (!function_exists('dynamic_menu')) {
	function dynamic_menu($file) { {
			if (file_exists(APPPATH . 'views/master/roles/' . $file . '.php'))
				loadView('roles/' . $file, TRUE);
			else
				loadView('roles/' . 'default', TRUE);
		}
	}
} //!function_exists('dynamic_menu')
if (!function_exists('dynamic_userinfo')) {
	function dynamic_userinfo($file) {
		$CI =& get_instance();
		$ip = $CI->input->ip_address();
		$CI->load->config('geolocation', true);
		$config = $CI->config->config['geolocation'];
		$CI->geolocation->initialize($config);
		$CI->geolocation->set_ip_address($ip);
		$CI->geolocation->set_format('');
		$CI->load->library('user_agent');
		if ($CI->agent->is_browser()) {
			$agent = $CI->agent->browser() . ' ' . $CI->agent->version();
		} //$CI->agent->is_browser()
		elseif ($CI->agent->is_robot()) {
			$agent = $CI->agent->robot();
		} //$CI->agent->is_robot()
			elseif ($CI->agent->is_mobile()) {
			$agent = $CI->agent->mobile();
		} //$CI->agent->is_mobile()
		else {
			$agent = 'Unidentified User Agent';
		}
		$OS   = $CI->agent->platform();
		$city = $CI->geolocation->get_city();
		if ($city === FALSE)
			($CI->geolocation->get_error());
		else
			($city);
		$timestamp = date("Y-m-d H:i:s");
		$info      = array(
			'timestamp' => $timestamp,
			'IP' => $city["ipAddress"],
			'Code' => $city["countryCode"],
			'Country' => $city["countryName"],
			'State' => $city["regionName"],
			'City' => $city["cityName"],
			'Visited' => $file,
			'Browser' => $agent,
			'OS' => $OS,
			'Zipcode' => $city["zipCode"],
			'Latitude' => $city["latitude"],
			'Longitude' => $city["longitude"],
			'TimeZone' => $city["timeZone"]
		);
		$CI->load->database();
		$CI->db->insert('Visiter_Info', $info);
		return $info;
	}
} //!function_exists('dynamic_userinfo')
?>
