<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelMahasiswa extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('sikoko_mahasiswa');
        $this->db->join('sikoko_riset_bidang', 'sikoko_riset_bidang.id_risbid = sikoko_mahasiswa.id_risbid', 'left');
        $this->db->join('sikoko_event', 'sikoko_event.id_event = sikoko_mahasiswa.id_event', 'left');
        $this->db->order_by('level', 'desc');
        $this->db->order_by('sikoko_mahasiswa.id_risbid', 'asc');

        return $this->db->get()->result_array();
    }
    public function getData($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->from('sikoko_mahasiswa');
        $this->db->join('sikoko_riset_bidang', 'sikoko_riset_bidang.id_risbid = sikoko_mahasiswa.id_risbid', 'left');
        return $this->db->get()->row_array();
    }
    public function getDataByEvent($id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->from('sikoko_mahasiswa');
        $this->db->join('sikoko_riset_bidang', 'sikoko_riset_bidang.id_risbid = sikoko_mahasiswa.id_risbid', 'left');
        return $this->db->get()->result_array();
    }
    public function updateData($data)
    {
        $this->db->where('nim', $data['nim']);
        $this->db->update('sikoko_mahasiswa', $data);
    }
}

/* End of file ModelMahasiswa.php */
