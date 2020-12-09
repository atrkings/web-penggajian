<?php

    class DataPenggajian extends CI_Controller 
    {
        public function index()

        {
            $data['title'] = "Data Gaji Pegawai";
            $data['gaji'] = $this->db->query ("SELECT 
            data_pegawai.no_rek, 
            data_pegawai.nama_pegawai, 
            data_pegawai.jenis_kelamin, 
            data_jabatan.nama_jabatan, 
            data_jabatan.gaji_pokok, 
            data_jabatan.gaji_lembur, 
            data_jabatan.tj_kesehatan ")

            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataGaji', $data);
            $this->load->view('templates_admin/footer');
        }
    }

?>