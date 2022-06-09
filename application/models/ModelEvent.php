<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelEvent extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('sikoko_event');

        return $this->db->get()->result_array();
    }
    public function insertData($data)
    {
        $this->db->insert('sikoko_event', $data);
    }
    public function getData($id_event)
    {
        $this->db->select('*');
        $this->db->where('id_event', $id_event);

        $this->db->from('sikoko_event');

        return $this->db->get()->row_array();
    }
    public function updateData($data)
    {
        $this->db->where('id_event', $data['id_event']);
        $this->db->update('sikoko_event', $data);
    }
}

/* End of file ModelEvent.php */
