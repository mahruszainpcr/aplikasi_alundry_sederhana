<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pelanggan/Pelanggan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pelanggan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Kode_Pelanggan' => $row->Kode_Pelanggan,
		'Nama_Pelanggan' => $row->Nama_Pelanggan,
		'Alamat_pelanggan' => $row->Alamat_pelanggan,
		'Nomor_HP' => $row->Nomor_HP,
		'Jenis_Pelanggan' => $row->Jenis_Pelanggan,
		'Tanggal_Aktif' => $row->Tanggal_Aktif,
		'id_pelanggan' => $row->id_pelanggan,
	    );
            $this->load->view('pelanggan/Pelanggan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelanggan/create_action'),
	    'Kode_Pelanggan' => set_value('Kode_Pelanggan'),
	    'Nama_Pelanggan' => set_value('Nama_Pelanggan'),
	    'Alamat_pelanggan' => set_value('Alamat_pelanggan'),
	    'Nomor_HP' => set_value('Nomor_HP'),
	    'Jenis_Pelanggan' => set_value('Jenis_Pelanggan'),
	    'Tanggal_Aktif' => set_value('Tanggal_Aktif'),
	    'id_pelanggan' => set_value('id_pelanggan'),
	);
        $this->load->view('pelanggan/Pelanggan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kode_Pelanggan' => $this->input->post('Kode_Pelanggan',TRUE),
		'Nama_Pelanggan' => $this->input->post('Nama_Pelanggan',TRUE),
		'Alamat_pelanggan' => $this->input->post('Alamat_pelanggan',TRUE),
		'Nomor_HP' => $this->input->post('Nomor_HP',TRUE),
		'Jenis_Pelanggan' => $this->input->post('Jenis_Pelanggan',TRUE),
		'Tanggal_Aktif' => $this->input->post('Tanggal_Aktif',TRUE),
	    );

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelanggan/update_action'),
		'Kode_Pelanggan' => set_value('Kode_Pelanggan', $row->Kode_Pelanggan),
		'Nama_Pelanggan' => set_value('Nama_Pelanggan', $row->Nama_Pelanggan),
		'Alamat_pelanggan' => set_value('Alamat_pelanggan', $row->Alamat_pelanggan),
		'Nomor_HP' => set_value('Nomor_HP', $row->Nomor_HP),
		'Jenis_Pelanggan' => set_value('Jenis_Pelanggan', $row->Jenis_Pelanggan),
		'Tanggal_Aktif' => set_value('Tanggal_Aktif', $row->Tanggal_Aktif),
		'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
	    );
            $this->load->view('pelanggan/Pelanggan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelanggan', TRUE));
        } else {
            $data = array(
		'Kode_Pelanggan' => $this->input->post('Kode_Pelanggan',TRUE),
		'Nama_Pelanggan' => $this->input->post('Nama_Pelanggan',TRUE),
		'Alamat_pelanggan' => $this->input->post('Alamat_pelanggan',TRUE),
		'Nomor_HP' => $this->input->post('Nomor_HP',TRUE),
		'Jenis_Pelanggan' => $this->input->post('Jenis_Pelanggan',TRUE),
		'Tanggal_Aktif' => $this->input->post('Tanggal_Aktif',TRUE),
	    );

            $this->Pelanggan_model->update($this->input->post('id_pelanggan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelanggan_model->get_by_id($id);

        if ($row) {
            $this->Pelanggan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kode_Pelanggan', 'kode pelanggan', 'trim|required');
	$this->form_validation->set_rules('Nama_Pelanggan', 'nama pelanggan', 'trim|required');
	$this->form_validation->set_rules('Alamat_pelanggan', 'alamat pelanggan', 'trim|required');
	$this->form_validation->set_rules('Nomor_HP', 'nomor hp', 'trim|required');
	$this->form_validation->set_rules('Jenis_Pelanggan', 'jenis pelanggan', 'trim|required');
	$this->form_validation->set_rules('Tanggal_Aktif', 'tanggal aktif', 'trim|required');

	$this->form_validation->set_rules('id_pelanggan', 'id_pelanggan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-14 19:35:00 */
/* http://harviacode.com */