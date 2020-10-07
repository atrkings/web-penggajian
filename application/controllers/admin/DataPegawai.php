<?php

class dataPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data
            ('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>