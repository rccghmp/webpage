<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Egiving extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  public function egiving() {
    $data['site_suffix'] = " | RCCG HMP";
    $data['page_title'] = ".:: Welcome to ";
    $this->load->view('sections/header');
    $this->load->view('egiving/egiving');
    $this->load->view('sections/footer');
  }
}
