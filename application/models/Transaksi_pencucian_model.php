<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pencucian_model extends CI_Model
{

    public $table = 'transaksi_pencucian';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('No_Faktur,Tanggal_Faktur,Kode_Pelanggan,Jenis_Paket,Harga,Jumlah_Kilo,Diskon,Total_Harga,id_transaksi');
        $this->datatables->from('transaksi_pencucian');
        //add this line for join
        //$this->datatables->join('table2', 'transaksi_pencucian.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi_pencucian/read/$1'),'Read')." | ".anchor(site_url('transaksi_pencucian/update/$1'),'Update')." | ".anchor(site_url('transaksi_pencucian/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_transaksi');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('No_Faktur', $q);
	$this->db->or_like('Tanggal_Faktur', $q);
	$this->db->or_like('Kode_Pelanggan', $q);
	$this->db->or_like('Jenis_Paket', $q);
	$this->db->or_like('Harga', $q);
	$this->db->or_like('Jumlah_Kilo', $q);
	$this->db->or_like('Diskon', $q);
	$this->db->or_like('Total_Harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('No_Faktur', $q);
	$this->db->or_like('Tanggal_Faktur', $q);
	$this->db->or_like('Kode_Pelanggan', $q);
	$this->db->or_like('Jenis_Paket', $q);
	$this->db->or_like('Harga', $q);
	$this->db->or_like('Jumlah_Kilo', $q);
	$this->db->or_like('Diskon', $q);
	$this->db->or_like('Total_Harga', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Transaksi_pencucian_model.php */
/* Location: ./application/models/Transaksi_pencucian_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-14 19:35:00 */
/* http://harviacode.com */