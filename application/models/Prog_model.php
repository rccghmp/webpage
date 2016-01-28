<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 24/12/15
 * Time: 1:12 PM
 */

class Prog_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('programme_listing', 10);
        return $query->result();
    }

    public function insert_prog()
    {
        $this->db->insert('programme_listing', $this);
    }

    public function update_entry()
    {
        $this->db->update('programme_listing', $this, array('id' => $_POST['id']));
    }

}

?>