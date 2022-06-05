<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->Model('ModelMahasiswa');
    }

    public function index()
    {
        $data =
            [
                'judul' => 'Admin | Mahasiswa',
                'title' => 'Role Mahasiswa',
                'mahasiswa' => $this->ModelMahasiswa->getAllData(),
                'page' => 'admin/mahasiswa/v_index',

            ];
        $this->load->view('templates/v_template', $data, false);
    }
    public function detail($nim)
    {
        $config = array(
            array(
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            // jika validasi salah
            $mahasiswa =  $this->ModelMahasiswa->getData($nim);
            $data =
                [
                    'judul' => 'Admin | Detail',
                    'title' => 'Data: ' . $mahasiswa['nama'],
                    'mahasiswa' => $mahasiswa,
                    'page' => 'admin/mahasiswa/v_detail',

                ];
            $this->load->view('templates/v_template', $data, false);
            $this->session->set_flashdata('pesan', '');
        } else {
            // jika benar
            $data = [
                'nim' => $nim,
                'level' => $this->input->post('level'),
            ];
            $this->ModelMahasiswa->updateData($data);
            $this->session->set_flashdata(
                'pesan',
                'Data Berhasil Di Update'
            );
            redirect('mahasiswa/detail/' . $nim);
        }
    }
}

/* End of file Mahasiswa.php */
