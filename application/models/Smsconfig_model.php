<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 24/12/15
 * Time: 1:12 PM
 */

class SmsConfig_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_config_settings()
    {
        $query = $this->db->get('basic_sms_config', 1);
        return $query->result();
    }

    public function insert_config_settings($data)
    {
        $this->db->truncate('basic_sms_config');
        $this->db->insert('basic_sms_config', $data);
    }

    public function update_config_settings()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}

?>