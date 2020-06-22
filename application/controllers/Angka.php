<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Angka extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Angka_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['data'] = $this->Angka_model->get_all();
        $this->load->view('angka/angka_list',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Angka_model->json();
    }

    public function read($id) 
    {
        $row = $this->Angka_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'A' => $row->A,
		'B' => $row->B,
		'C' => $row->C,
	    );
            $this->load->view('angka/angka_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angka'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('angka/create_action'),
	    'id' => set_value('id'),
	    'A' => set_value('A'),
	    'B' => set_value('B'),
	    'C' => set_value('C'),
	);
        $this->load->view('angka/angka_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'A' => $this->input->post('A',TRUE),
		'B' => $this->input->post('B',TRUE),
		'C' => $this->input->post('C',TRUE),
	    );

            $this->Angka_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('angka'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Angka_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('angka/update_action'),
		'id' => set_value('id', $row->id),
		'A' => set_value('A', $row->A),
		'B' => set_value('B', $row->B),
		'C' => set_value('C', $row->C),
	    );
            $this->load->view('angka/angka_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angka'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'A' => $this->input->post('A',TRUE),
		'B' => $this->input->post('B',TRUE),
		'C' => $this->input->post('C',TRUE),
	    );

            $this->Angka_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('angka'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Angka_model->get_by_id($id);

        if ($row) {
            $this->Angka_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('angka'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('angka'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('A', 'a', 'trim|required');
	$this->form_validation->set_rules('B', 'b', 'trim|required');
	$this->form_validation->set_rules('C', 'c', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
