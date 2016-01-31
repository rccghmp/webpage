<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 31/01/16
 * Time: 1:12 PM
 */

class Enquiries_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_entries($val)
    {
        $val = (!is_null($val)) ? $val : '*';
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('enquiries_tbl', $val);
        return $query->result();
    }

    public function insert_enquiry($data)
    {
        $this->db->insert('enquiries_tbl', $data);
    }

    public function update_entry()
    {
        $this->db->update('enquiries_tbl', $this, array('id' => $_POST['id']));
    }

}

?>