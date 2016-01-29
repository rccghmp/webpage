<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function enquiry() {
		$data['site_suffix'] = " | RCCG HMP";
		$data['page_title'] = ".:: Welcome to ";
		$this->load->view('sections/header');
		$this->load->view('contacts/enquiry', $data);
		$this->load->view('sections/footer');
	}
}
