<?php 

class Dashboard extends CI_Controller{
    public function index(){
        $data['title'] = 'Dashboard';
        // narik data pegawai untuk halaman dashboard
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $data['pegawai'] = $pegawai->num_rows();
        // END narik data pegawai untuk halaman dashboard

        // narik data admin untuk halaman dashboard
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin' ");
        $data['admin'] = $admin->num_rows();
        // END narik data admin untuk halaman dashboard

        // narik data Jabatan untuk halaman dashboard
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $data['jabatan'] = $jabatan->num_rows();
        // end narik data Jabatan untuk halaman dashboard

        // narik data Jabatan untuk halaman dashboard
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        $data['kehadiran'] = $kehadiran->num_rows();
        // end narik data Jabatan untuk halaman dashboard

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('template_admin/footer');
       
    }
}
