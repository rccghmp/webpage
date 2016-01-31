<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['site_suffix'] = " | RCCG HMP";
		$data['page_title'] = ".:: Welcome to ";
		$this->load->view('sections/header');
		$this->load->view('contacts/enquiry', $data);
		$this->load->view('sections/footer');
	}

	public function enquiry() {
		$current_date_time = date('Y-m-d H:i:s');
		$enquiry_id = $current_date_time. ','. rand(292783, 9383832);

		$response = array();
		$contact_name = $this->input->post('contact_name');
		$email = $this->input->post('email');
		$phone_no = $this->input->post('phone_no');
		$contact_message = $this->input->post('contact_message');

		$data = array(
			'enquiry_id' => $enquiry_id,
			'name' => $contact_name,
			'email' => $email,
			'message' => $contact_message,
			'phone_no' => $phone_no,
			'created_at' => $current_date_time
		);

		$this->enquiries_model->insert_enquiry($data);

		$response['status'] = true;
		$response['contact_name'] = $contact_name;
		echo json_encode($response);
		return;
	}
}
