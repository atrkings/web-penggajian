<?php

    class DataJabatan extends CI_Controller
    {
        public function index()
        {
            $data['title'] = "Data Jabatan";
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')
                ->result();
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataJabatan', $data);
            $this->load->view('templates_admin/footer');
        }

        public function tambahData()
            {
                $data['title'] = "Tambah Data Jabatan";
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/sidebar');
                $this->load->view('admin/tambahDataJabatan', $data);
                $this->load->view('templates_admin/footer');
            }

        public function tambahDataAksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambahData();
            }
            else
            {
                $nama_jabatan = $this->input->post('nama_jabatan');
                $gaji_pokok = $this->input->post('gaji_pokok');
                $gaji_lembur = $this->input->post('gaji_lembur');
                $tj_kesehatan = $this->input->post('tj_kesehatan');

                $data = array (
                    'nama_jabatan' => $nama_jabatan,
                    'gaji_pokok' => $gaji_pokok,
                    'gaji_lembur' => $gaji_lembur,
                    'tj_kesehatan' => $tj_kesehatan,
                );

                $this->penggajianModel->insert_data($data,'data_jabatan');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Woa! Selamat, datamu berhasil ditambahkan</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('admin/dataJabatan');
            }
        }


        public function updateData($id)
            {
                $where = array('id_jabatan' => $id);
                $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();
                $data['title'] = "Tambah Data Jabatan";
                $this->load->view('templates_admin/header', $data);
                $this->load->view('templates_admin/sidebar');
                $this->load->view('admin/updateDataJabatan', $data);
                $this->load->view('templates_admin/footer');
            }

        public function updateDataAksi()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->updateData();
            }
            else
            {
                $id = $this->input->post('id_jabatan');
                $nama_jabatan = $this->input->post('nama_jabatan');
                $gaji_pokok = $this->input->post('gaji_pokok');
                $gaji_lembur = $this->input->post('gaji_lembur');
                $tj_kesehatan = $this->input->post('tj_kesehatan');

                $data = array (
                    'nama_jabatan' => $nama_jabatan,
                    'gaji_pokok' => $gaji_pokok,
                    'gaji_lembur' => $gaji_lembur,
                    'tj_kesehatan' => $tj_kesehatan,
                );

                $where = array
                (
                    'id_jabatan' => $id
                );

                $this->penggajianModel->update_data('data_jabatan',$data,$where);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Woa! Selamat, datamu berhasil diupdate</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('admin/dataJabatan');
            }
        }

        public function _rules()
        {
            $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
            $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
            $this->form_validation->set_rules('gaji_lembur','gaji lembur','required');
            $this->form_validation->set_rules('tj_kesehatan','tunjangan kesehatan','required');
        }
    }


?>