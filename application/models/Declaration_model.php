<?php
/**
 * Created by PhpStorm.
 * User: phemmy
 * Date: 24/12/15
 * Time: 1:12 PM
 */

class Declaration_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_entries($val)
    {
        $val = (!is_null($val)) ? $val : '*';
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('declaration_bank', $val);
        return $query->result();
    }

    public function insert_declaration($data)
    {
        $this->db->insert('declaration_bank', $data);
    }

    public function update_entry()
    {
        $this->db->update('declaration_bank', $this, array('id' => $_POST['id']));
    }

}

?>