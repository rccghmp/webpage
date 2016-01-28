<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Church extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['site_suffix'] = " | RCCG HMP";
		$data['page_title'] = ".:: Welcome to ";
		$this->load->view('sections/header');
		$this->load->view('church/homepage/index', $data);
		$this->load->view('sections/footer');
	}

	public function login() {
		$data['site_suffix'] = " | eFollowUp";
		$data['page_title'] = "Admin Account Login";
		$this->load->view('church/login', $data);
	}

	public function dashboard() {
		$response['title'] = '';
		$smsBalance = getSmsBalance();

		if($smsBalance) {
			$response['sms_balance'] = $smsBalance;
		}
		$this->load->view('church/dashboard', $response);
	}

	public function addMember() {
		$response['age_group'] = getAgeGroup();
		$response['marital_status'] = getMaritalStatus();
		$response['dob_months'] = getDobMonths();
		$response['dob_days'] = getDobDays();
		$this->load->view('church/members/add_member', $response);
	}

	public function addVisitor() {
		$response['age_group'] = getAgeGroup();
		$response['marital_status'] = getMaritalStatus();
		$response['dob_months'] = getDobMonths();
		$response['dob_days'] = getDobDays();
		$this->load->view('church/members/add_visitor', $response);
	}

	function contacts() {
		$this->load->view('church/contacts');
	}


	/* the actions handles the programmes/units section */
	public function createEvent() {
		$response['event_occurence'] = getProgramOccurence();
		$this->load->view('church/programmes/create_program', $response);
	}

	public function createDept() {
		$response['event_occurence'] = getProgramOccurence();

		$data['sideUse'] = "Instant";

		$displayEntries = null;
		$entriesToDisplay = $this->dept_model->get_last_entries($displayEntries);

		if(count($entriesToDisplay) > 0) {
			$data['displayEntries'] = $entriesToDisplay;
		}

		$this->load->view('church/programmes/create_dept', $response);
	}


	public function insertNewEvent() {
		$curDate = getCurDateStamp();

		$data = array(
			'dept_code' => getRandomString(10),
			'dept_name' => $this->input->post('dept_name'),
			'description' => $this->input->post('dept_desc'),
			'dept_email' => $this->input->post('dept_email'),
			'dept_phone' => $this->input->post('dept_phone'),
			'created_at' => $curDate
		);

	//Transfering data to Model
		$this->dept_model->insert_dept($data);

		if($this->db->affected_rows() >= 1) {
			$response['declareSuccessfull'] = 'Dept Saved Successfully.';
		} else {
			$response['declareError'] = "Oops. Something went wrong";
		}

	//Loading View
		$this->load->view('church/programmes/create_dept', $response);
	}

	/* /the actions handles the programmes/units section */


	/* This part handles the scheduler tab */
	public function dailyDeclarations() {
		$data['sideUse'] = "Instant";

		$displayEntries = null;
		$entriesToDisplay = $this->declaration_model->get_last_entries($displayEntries);

		if(count($entriesToDisplay) > 0) {
			$data['displayEntries'] = $entriesToDisplay;
		}

		$this->load->view('church/declarations/view', $data);
	}

	public function insertDeclaration() {

		$curDate = getCurDateStamp();
		$d_code = getRandomString(10);

		$data = array(
			'd_code' => $d_code,
			'd_msg' => stripslashes($this->input->post('declaration_msg')),
			'd_status' => $this->input->post('declaration_status'),
			'created_at' => $curDate
		);

		$data['d_status'] = is_null($data['d_status']) ? 0 : 1;

		if(!is_null($data['d_msg']) && $data['d_msg'] !== "") {
			//Transfering data to Model
			$this->declaration_model->insert_declaration($data);
			$data['d_successful'] = 'Data Inserted Successfully';
		}

		//Loading View
		$this->dailyDeclarations();
	}


	public function sendDeclaration() {

		$data = array(
			'sender' => $this->input->post('sender'),
			'recipient' => $this->input->post('recipient'),
			'message' => $this->input->post('message')
		);

		$validateNumber = phoneNumberValidation($data['recipient']);

		if(!is_null($validateNumber)) {
			$data['recipient'] = $validateNumber;
			$totalRecipient = count($validateNumber) ? count($validateNumber) : 0;

			$result = sendSms($data);

			$curDate = getCurDateStamp();

			$logData = array(
				'details' => 'Daily declaration',
				'msg_code' => $this->input->post('code_text_value'),
				'sent_by' => 'Oluwafemi',
				'created_at' => $curDate,
				'total_recipients' => (int) $totalRecipient
			);
			$this->smsusagelog_model->insert_log($logData);

			$response['declareSuccessfull'] = 'SMS Sent Successfully.';
		} else {
			$response['declareError'] = "Invalid Phone Number format detected";
		}

		$this->load->view('church/declarations/view', $response);
	}

	/* /This part handles the scheduler tab */


	/* this section handles the configurations part */
	public function configSms() {

		$response['title'] = '';
		$smsBalance = getSmsBalance();

		if($smsBalance) {
			$response['sms_balance'] = $smsBalance;
		}

		$smsConfigSettings = getSmsConfig();

		if(isset($smsConfigSettings['config_settings'])) {
			$response['config_settings'] = $smsConfigSettings['config_settings'];
		}

		$this->load->view('church/configurations/sms/sms_settings', $response);
	}

	public function insertSmsConfig() {
		$response['title'] = "";

		if(!empty($this->input->post('account_holder'))
			&& !empty($this->input->post('account_password'))
			&& !empty($this->input->post('api_base_url'))) {

			$curDate = getCurDateStamp();
			$cipherpassword = $this->encrypt->encode(trim($this->input->post('account_password')));

			$data = array(
				'account_holder' => trim($this->input->post('account_holder')),
				'account_password' => $cipherpassword,
				'api_base_url' => trim($this->input->post('api_base_url')),
				'single_sms_url' => trim($this->input->post('single_sms_url')),
				'account_balance_url' => trim($this->input->post('account_balance_url')),
				'multi_sms_url' => trim($this->input->post('multi_sms_url')),
				'created_at' => $curDate
			);

			//Transfering data to Model
			$this->smsconfig_model->insert_config_settings($data);
			$response['insertSmsConfigMsg'] = 'Settings was done successfully.';

		}

		//redirect(base_url('church/configSms'));
		//Loading View
		$this->load->view('church/configurations/sms/sms_settings', $response);
	}
	/* /this section handles the configurations part */
}
