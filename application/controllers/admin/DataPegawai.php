<?php

class DataPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function dataTambah()
    {
        $data['title'] = 'Tambah Data Pegawai';
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambahDataPegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function dataTambahAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->dataTambah();
        } else {
            $nik                = $this->input->post('nik');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');
            $jabatan            = $this->input->post('jabatan');
            $status             = $this->input->post('status');
            $photo              = $_FILES['photo']['name'];

            if ($photo = '') {
            } else {
                $config['upload_path']     = './assets/photo';
                $config['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Photo Gagal diupload!";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'photo' => $photo,
            );

            $this->PenggajianModel->insert_data_pegawai($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Di Tambahkan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataPegawai');
        }
    }

    public function updateDataPegawai($id)
    {
        $where = array('id_pegawai' => $id);
        $data['title'] = 'Update Data Pegawai';

        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id' ")->result();

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/updateDataPegawai', $data);
        $this->load->view('template_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateDataPegawai();
        } else {
            $id                 = $this->input->post('id_pegawai');
            $nik                = $this->input->post('nik');
            $nama_pegawai       = $this->input->post('nama_pegawai');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');
            $jabatan            = $this->input->post('jabatan');
            $status             = $this->input->post('status');
            $photo              = $_FILES['photo']['name'];

            if ($photo) {
                $config['upload_path']     = './assets/photo';
                $config['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
            );

            $where = array(
                'id_pegawai' => $id,
            );


            $this->PenggajianModel->update_data_pegawai('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Di Update</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PenggajianModel->delete_data_pegawai($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Di Hapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/DataPegawai');
    }
}
