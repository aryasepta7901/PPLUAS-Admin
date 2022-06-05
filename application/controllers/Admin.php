<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDashboard');
        $this->load->model('ModelMahasiswa');
        $this->load->model('ModelEvent');
    }

    public function index()
    {
        $data =
            [
                'judul' => 'Admin | Dashboard',
                'title' => 'Dashboard',
                'mahasiswa' => $this->ModelDashboard->getAllData(),
                'pendaftarOffline' => $this->ModelDashboard->pendaftarOffline(),
                'pendaftarOnlineZoom' => $this->ModelDashboard->pendaftarOnlineZoom(),
                'pendaftarOnlineYoutube' => $this->ModelDashboard->pendaftarOnlineYoutube(),

                'event' => $this->ModelEvent->getAllData(),

                'page' => 'admin/v_dashboard',

            ];
        $this->load->view('templates/v_template', $data, false);
        $this->session->set_flashdata('pesan', '');
    }
    public function updateData($nim)
    {
        $config = array(
            array(
                'field' => 'id_event',
                'label' => 'Event',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),

        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            // jika validasi salah
            $data =
                [
                    'judul' => 'Admin | Dashboard',
                    'title' => 'Dashboard',
                    'mahasiswa' => $this->ModelDashboard->getAllData(),
                    'event' => $this->ModelEvent->getAllData(),

                    'page' => 'admin/v_dashboard',

                ];
            $this->load->view('templates/v_template', $data, false);
        } else {
            // jika benar
            $data = [
                'nim' => $nim,
                'id_event' => $this->input->post('id_event'),
            ];
            $this->ModelMahasiswa->updateData($data);
            $this->session->set_flashdata(
                'pesan',
                'Data Berhasil Di Update'
            );
            redirect('admin');
        }
    }
}

/* End of file Admin.php */
