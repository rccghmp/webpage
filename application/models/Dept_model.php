<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 24/12/15
 * Time: 1:12 PM
 */

class Dept_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_n_entries()
    {
        $query = $this->db->get('dept_listing');
        return $query->result();
    }

    public function get_last_entries($val)
    {
        $val = (!is_null($val)) ? $val : '*';
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('dept_listing', $val);
        return $query->result();
    }

    public function insert_dept($data)
    {
        $curDate = getCurDateStamp();
        $data['created_at'] = $curDate;
        $this->db->insert('dept_listing', $data);
    }

    public function update_entry()
    {
        $this->db->update('dept_listing', $this, array('id' => $_POST['id']));
    }

}

?>