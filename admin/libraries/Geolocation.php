<?php
defined('BASEPATH') or die('No direct script access.');
class Geolocation {
	const VERSION = '1.0';
	private $error = '';
	private $api = '';
	private $api_version = '';
	private $api_key = '';
	private $ip_address = '';
	private $format = '';
	public function __construct($params = array()) {
		if (count($params) > 0) {
			$this->initialize($params);
		} //count($params) > 0
		log_message('debug', "Geolocation Class Initialized");
	}
	public function initialize($params = array()) {
		if (count($params) > 0) {
			foreach ($params as $key => $val) {
				if (isset($this->{$key}))
					$this->{$key} = $val;
			} //$params as $key => $val
		} //count($params) > 0
		return $this;
	}
	public function set_api_key($api_key) {
		$this->api_key = $api_key;
		return $this;
	}
	public function set_ip_address($ip_address) {
		$this->ip_address = $ip_address;
		return $this;
	}
	public function set_format($format) {
		$this->format = empty($format) ? $this->format : $format;
		return $this;
	}
	public function get_error() {
		return $this->error;
	}
	public function get_country() {
		return $this->locate('ip-country');
	}
	public function get_city() {
		return $this->locate('ip-city');
	}
	private function locate($type) {
		if (@inet_pton($this->ip_address) === false) {
			$this->error = 'Invalid IP Address : ' . $this->ip_address;
			log_message('error', 'Geolocation => ' . $this->error);
			return false;
		} //@inet_pton($this->ip_address) === false
		$as_array     = empty($this->format);
		$this->format = $as_array ? 'json' : $this->format;
		$url          = $this->api . $this->api_version . '/' . $type . '/' . '?key=' . $this->api_key . '&ip=' . $this->ip_address . '&format=' . $this->format;
		return $this->get_result($url, $as_array);
	}
	private function get_result($url, $as_array = FALSE) {
		$data = @file_get_contents($url);
		switch ($this->format) {
			case 'json':
				$result = json_decode($data);
				break;
			case 'xml':
				$result = simplexml_load_string($data);
				$result = json_decode(json_encode((array) $result));
				break;
			default:
				$result = explode(';', $data);
		} //$this->format
		if ((isset($result->statusCode) && $result->statusCode == 'ERROR') || (is_array($result) && $result[0] == 'ERROR')) {
			$this->error = isset($result->statusMessage) ? $result->statusMessage : $result[1];
			log_message('error', 'Geolocation => ' . $this->error);
			return FALSE;
		} //(isset($result->statusCode) && $result->statusCode == 'ERROR') || (is_array($result) && $result[0] == 'ERROR')
		return $as_array ? (array) $result : $data;
	}
}
?>