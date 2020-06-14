<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pencucian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Transaksi_pencucian_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaksi_pencucian/transaksi_pencucian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_pencucian_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_pencucian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'No_Faktur' => $row->No_Faktur,
		'Tanggal_Faktur' => $row->Tanggal_Faktur,
		'Kode_Pelanggan' => $row->Kode_Pelanggan,
		'Jenis_Paket' => $row->Jenis_Paket,
		'Harga' => $row->Harga,
		'Jumlah_Kilo' => $row->Jumlah_Kilo,
		'Diskon' => $row->Diskon,
		'Total_Harga' => $row->Total_Harga,
		'id_transaksi' => $row->id_transaksi,
	    );
            $this->load->view('transaksi_pencucian/transaksi_pencucian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pencucian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_pencucian/create_action'),
	    'No_Faktur' => set_value('No_Faktur'),
	    'Tanggal_Faktur' => set_value('Tanggal_Faktur'),
	    'Kode_Pelanggan' => set_value('Kode_Pelanggan'),
	    'Jenis_Paket' => set_value('Jenis_Paket'),
	    'Harga' => set_value('Harga'),
	    'Jumlah_Kilo' => set_value('Jumlah_Kilo'),
	    'Diskon' => set_value('Diskon'),
	    'Total_Harga' => set_value('Total_Harga'),
	    'id_transaksi' => set_value('id_transaksi'),
	);
        $this->load->view('transaksi_pencucian/transaksi_pencucian_form', $data);
    }
    
    public function create_action() 
    {
       
            $kode=$this->input->post('Kode_Pelanggan',TRUE);
            $jumlahKilo=$this->input->post('Jumlah_Kilo',TRUE);
            $jenisPaket=$this->input->post('Jenis_Paket',TRUE);
            $harga=0;
            if($jenisPaket=="Cucian + Setrika (Harga 10.000/kg)"){
                $harga=10000;
            }else if($jenisPaket=="Cuci Saja (Harga 6.000/kg)"){
                $harga=6000;
            }else{
                $harga=4000;
            }
            $totalHarga=$harga*$jumlahKilo;
            $diskon=0;
            $pelanggan=$this->db->query("Select * from Pelanggan where Kode_Pelanggan=".$kode)->row();
            if($pelanggan->Jenis_Pelanggan=="Platinum"&&$jumlahKilo>3){
               $diskon=(5/100)*$totalHarga;
            }
            $totalHargaFinal=$totalHarga-$diskon;
            $data = array(
		'No_Faktur' => $this->input->post('No_Faktur',TRUE),
		'Tanggal_Faktur' => $this->input->post('Tanggal_Faktur',TRUE),
		'Kode_Pelanggan' => $this->input->post('Kode_Pelanggan',TRUE),
		'Jenis_Paket' => $this->input->post('Jenis_Paket',TRUE),
		'Harga' => $harga,
		'Jumlah_Kilo' => $this->input->post('Jumlah_Kilo',TRUE),
		'Diskon' => $diskon,
		'Total_Harga' => $totalHargaFinal,
	    );

            $this->Transaksi_pencucian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_pencucian'));
       
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_pencucian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_pencucian/update_action'),
		'No_Faktur' => set_value('No_Faktur', $row->No_Faktur),
		'Tanggal_Faktur' => set_value('Tanggal_Faktur', $row->Tanggal_Faktur),
		'Kode_Pelanggan' => set_value('Kode_Pelanggan', $row->Kode_Pelanggan),
		'Jenis_Paket' => set_value('Jenis_Paket', $row->Jenis_Paket),
		'Harga' => set_value('Harga', $row->Harga),
		'Jumlah_Kilo' => set_value('Jumlah_Kilo', $row->Jumlah_Kilo),
		'Diskon' => set_value('Diskon', $row->Diskon),
		'Total_Harga' => set_value('Total_Harga', $row->Total_Harga),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
	    );
            $this->load->view('transaksi_pencucian/transaksi_pencucian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pencucian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'No_Faktur' => $this->input->post('No_Faktur',TRUE),
		'Tanggal_Faktur' => $this->input->post('Tanggal_Faktur',TRUE),
		'Kode_Pelanggan' => $this->input->post('Kode_Pelanggan',TRUE),
		'Jenis_Paket' => $this->input->post('Jenis_Paket',TRUE),
		'Harga' => $this->input->post('Harga',TRUE),
		'Jumlah_Kilo' => $this->input->post('Jumlah_Kilo',TRUE),
		'Diskon' => $this->input->post('Diskon',TRUE),
		'Total_Harga' => $this->input->post('Total_Harga',TRUE),
	    );

            $this->Transaksi_pencucian_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pencucian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_pencucian_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_pencucian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_pencucian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pencucian'));
        }
    }

    public function _rules() 
    {
	
    }

}

/* End of file Transaksi_pencucian.php */
/* Location: ./application/controllers/Transaksi_pencucian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-14 19:35:00 */
/* http://harviacode.com */