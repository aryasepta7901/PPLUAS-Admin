<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelEvent');
        $this->load->model('ModelMahasiswa');
    }

    public function index()
    {
        $data =
            [
                'judul' => 'Admin | Event',
                'title' => 'Event',
                'event' => $this->ModelEvent->getAllData(),
                'page' => 'admin/event/v_index',

            ];
        $this->load->view('templates/v_template', $data, false);
        $this->session->set_flashdata('pesan', '');
    }
    public function addData()
    {
        $config = array(
            array(
                'field' => 'nama_event',
                'label' => 'Nama Event',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'kuota',
                'label' => 'Kuota',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'waktu_mulai',
                'label' => 'Waktu Mulai',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'waktu_selesai',
                'label' => 'Waktu Selesai',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'tempat',
                'label' => 'Tempat',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'link_zoom',
                'label' => 'link',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            // jika validasi salah
            $data =
                [
                    'judul' => 'Admin | Event',
                    'title' => 'Add Data Event',
                    'event' => $this->ModelEvent->getAllData(),
                    'page' => 'admin/event/v_add',

                ];
            $this->load->view('templates/v_template', $data, false);
            $this->session->set_flashdata('pesan', '');
        } else {


            $kode_satu =  strtoupper(random_string($type = 'alnum', 5));
            $kode_dua =  strtoupper(random_string($type = 'alnum', 5));



            $data = [
                'nama_event' => $this->input->post('nama_event'),
                'tempat' => $this->input->post('tempat'),
                'kode_satu' =>  $kode_satu,
                'kode_dua' => $kode_dua,
                'kuota' => $this->input->post('kuota'),
                'link_zoom' => $this->input->post('link_zoom'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
            ];
            $this->ModelEvent->insertData($data);
            $this->session->set_flashdata(
                'pesan',
                'Data Berhasil Di Update'
            );
            redirect('event');
        }
    }
    public function detail($id_event)
    {
        $data =
            [
                'judul' => 'Admin | Detail Event',
                'title' => 'Detail',
                'event' => $this->ModelEvent->getData($id_event),
                'mahasiswa' => $this->ModelMahasiswa->getDataByEvent($id_event),
                'page' => 'admin/event/v_detail',

            ];
        $this->load->view('templates/v_template', $data, false);
        $this->session->set_flashdata('pesan', '');
        $this->session->set_flashdata('error', '');
    }
    public function updateData($id_event)
    {
        $config = array(
            array(
                'field' => 'kuota',
                'label' => 'Kuota',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'link_zoom',
                'label' => 'Link',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'waktu_mulai',
                'label' => 'Waktu Mulai',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
            array(
                'field' => 'waktu_selesai',
                'label' => 'Waktu Selesai',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            // jika validasi salah
            $data =
                [
                    'judul' => 'Admin | Event',
                    'title' => 'Event',
                    'event' => $this->ModelEvent->getAllData(),
                    'page' => 'admin/event/v_index',

                ];
            $this->load->view('templates/v_template', $data, false);
            $this->session->set_flashdata('pesan', '');
        } else {
            // jika benar
            $data = [
                'id_event' => $id_event,
                'kuota' => $this->input->post('kuota'),
                'link_zoom' => $this->input->post('link_zoom'),
                'waktu_mulai' => $this->input->post('waktu_mulai'),
                'waktu_selesai' => $this->input->post('waktu_selesai'),
            ];
            $this->ModelEvent->updateData($data);
            $this->session->set_flashdata(
                'pesan',
                'Data Berhasil Di Update'
            );
            redirect('event');
        }
    }
    public function updateDataMahasiswaAbsen1($id_event, $nim)
    {
        $config = array(
            array(
                'field' => 'absen_awal',
                'label' => 'Absen',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $data =
                [
                    'judul' => 'Admin | Detail Event',
                    'title' => 'Detail',
                    'event' => $this->ModelEvent->getData($id_event),
                    'mahasiswa' => $this->ModelMahasiswa->getDataByEvent($id_event),
                    'page' => 'admin/event/v_detail',
                ];
            $this->load->view('templates/v_template', $data, false);
        } else {
            // jika benar
            $event = $this->ModelEvent->getData($id_event);
            $absen_awal = $this->input->post('absen_awal');


            //cek apakah kode yang dikirim sama dengan database
            if ($event['kode_satu'] == $absen_awal) {
                $event = 1;
                $data = [
                    'nim' => $nim,
                    'absen_awal' => $event,
                ];
                $this->ModelMahasiswa->updateData($data);
                $this->session->set_flashdata(
                    'pesan',
                    'Absen Pertama Berhasil di lakukan'
                );
                redirect('event/detail/' . $id_event);
            } else {
                // jika beda
                $this->session->set_flashdata(
                    'error',
                    'Absen Pertama Salah'
                );
                redirect('event/detail/' . $id_event);
            }
        }
    }
    public function updateDataMahasiswaAbsen2($id_event, $nim)
    {
        $config = array(
            array(
                'field' => 'absen_akhir',
                'label' => 'Absen',
                'rules' => 'required|trim', //agar spasi tidak masuk didalam spasi
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $data =
                [
                    'judul' => 'Admin | Detail Event',
                    'title' => 'Detail',
                    'event' => $this->ModelEvent->getData($id_event),
                    'mahasiswa' => $this->ModelMahasiswa->getDataByEvent($id_event),
                    'page' => 'admin/event/v_detail',
                ];
            $this->load->view('templates/v_template', $data, false);
        } else {
            // jika benar
            $event = $this->ModelEvent->getData($id_event);
            $absen_akhir = $this->input->post('absen_akhir');


            //cek apakah kode yang dikirim sama dengan database
            if ($event['kode_dua'] == $absen_akhir) {
                $event = 1;
                $data = [
                    'nim' => $nim,
                    'absen_akhir' => $event,
                ];
                $this->ModelMahasiswa->updateData($data);
                $this->session->set_flashdata(
                    'pesan',
                    'Absen Terakhir Berhasil di lakukan'
                );
                redirect('event/detail/' . $id_event);
            } else {
                // jika beda
                $this->session->set_flashdata(
                    'error',
                    'Absen Kedua Salah'
                );
                redirect('event/detail/' . $id_event);
            }
        }
    }
}

/* End of file Mahasiswa.php */
