<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->model('Clients_model');
        $this->load->model('Editors_model');
        $this->load->model('Essay_model');

        $user = $this->session->userdata('email');
        $role = $this->session->userdata('role');

        if ($role != 'admins') {
            redirect('/');
        }
    }

    public function students_essay()
    {
        $data['menus'] = 'export';
        $data['submenus'] = 'students';

        $this->form_validation->set_rules('month','Month','required');
        $this->form_validation->set_rules('year','Year','required');

        if($this->form_validation->run()==false){
            $data['month'] = date('m');
            $data['year'] = date('Y');
            $data['essay'] = $this->Essay_model->getEssayExport($m='', $y='');
        } else {
            $m = $this->input->post('month');
            $y = $this->input->post('year');
            $data['month']  = $m;
            $data['year'] = $y;
            $data['essay'] = $this->Essay_model->getEssayExport($m, $y);
        }
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/export/students-essay');
        $this->load->view('templates/user/footer');
    }

    public function editors_essay()
    {
        $data['menus'] = 'export';
        $data['submenus'] = 'editors';
        $data['editors'] = $this->Editors_model->getAllEditors();

        $this->form_validation->set_rules('editors','editor name','required');
        $this->form_validation->set_rules('month','Month','required');
        $this->form_validation->set_rules('year','Year','required');

        if($this->form_validation->run()==false){
            $data['se'] = '';
            $data['month'] = date('m');
            $data['year'] = date('Y');
            $data['et'] = '';
            $data['essay'] = $this->Essay_model->getEssayEditorsExport($m='', $y='');
        } else {
            $m = $this->input->post('month');
            $y = $this->input->post('year');
            $e = $this->input->post('editors');
            $essay_type = $this->input->post('essay_type');
            
            if($e=='all'){
                $data['se'] = 'all';
                $data['month']  = $m;
                $data['year'] = $y;
                $data['et'] = $essay_type;
                $data['essay'] = $this->Essay_model->getEssayEditorsExport($m, $y, $essay_type);
            } else {
                $data['se'] = $e;
                $data['month']  = $m;
                $data['year'] = $y;
                $data['et'] = $essay_type;
                $data['essay'] = $this->Essay_model->getEssayEditorsExportByEditors($m, $y, $e, $essay_type); 
            }
        }
        $data['essay_title'] = ['Common App','Coalition App', 'UCAS', 'Personal Statement', 'Supplemental Essay','Other'];
        
        $this->load->view('templates/user/header');
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('templates/user/topbar');
        $this->load->view('user/admin/export/editors-essay');
        $this->load->view('templates/user/footer');
    }


    public function students()
    {
        $data['students'] = $this->Clients_model->getAllClients();
        $data['title'] = 'Student Report '.date('d-M-Y');
        $this->load->view('export/student-report', $data);
    }

    public function editors()
    {
        $data['editors'] = $this->Editors_model->getAllEditors();
        $data['title'] = 'Editor Report '.date('d-M-Y');
        $this->load->view('export/editor-report', $data);
    }

    public function essay_students($m, $y)
    {
        $data['essay'] = $this->Essay_model->getEssayExport($m, $y);
        $data['title'] = 'Essay Students Report '.$m.'-'.$y;
        $this->load->view('export/essay-students-report', $data);
    }

    public function essay_editors($m, $y, $e)
    {
        if($e=='all') {
            $data['essay'] = $this->Essay_model->getEssayEditorsExport($m, $y);
            $data['title'] = 'All Editors Report '.$m.'-'.$y;
        } else {
            $data['essay'] = $this->Essay_model->getEssayEditorsExportByEditors($m, $y, $e);
            $editors = $this->Editors_model->getAllEditorsByEmail($e);
            $data['title'] = $editors['first_name'].' '.$editors['last_name'].' Report '.$m.'-'.$y;
        }
        
        $this->load->view('export/essay-editors-report', $data);
    }


}