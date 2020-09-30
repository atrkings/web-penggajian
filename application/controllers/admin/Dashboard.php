<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $data['pegawai'] = $pegawai->num_rows();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>