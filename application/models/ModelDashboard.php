<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashboard extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('sikoko_mahasiswa');
        $this->db->join('sikoko_riset_bidang', 'sikoko_riset_bidang.id_risbid = sikoko_mahasiswa.id_risbid', 'left');
        $this->db->join('sikoko_event', 'sikoko_event.id_event = sikoko_mahasiswa.id_event', 'left');
        $this->db->order_by('sikoko_mahasiswa.id_event', 'desc');

        return $this->db->get()->result_array();
    }
    public function pendaftarOffline()
    {
        $this->db->where('id_event', 1);
        $query = $this->db->get('sikoko_mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function pendaftarOnlineZoom()
    {
        $this->db->where('id_event', 2);
        $query = $this->db->get('sikoko_mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function pendaftarOnlineYoutube()
    {
        $this->db->where('id_event', 3);
        $query = $this->db->get('sikoko_mahasiswa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

/* End of file ModelDashboard.php */
