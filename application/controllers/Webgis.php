<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Webgis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_permandian');
        
    }

    public function index()
    {
        $data = array(
            'title'      => 'Web GIS Permandian',
            'permandian' => $this->m_permandian->tampil(),
            'isi'        => 'v_webgis'
           );
            $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function list_permandian()
    {
        $data = array(
            'title'      => 'Web GIS Permandian',
            'permandian' => $this->m_permandian->tampil(),
            'isi'        => 'v_list_permandian'
           );
            $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function about()
    {
        $data = array(
            'title'      => 'Web GIS Permandian',
            'isi'        => 'v_about'
           );
            $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

    public function detail($id_permandian)
    {
        $data = array(
            'title'      => 'Detail Permandian',
            'permandian' => $this->m_permandian->detail($id_permandian),
            'isi'        => 'v_detail'
           );
           $this->load->view('front_end/v_wrapper', $data, FALSE);
    }

}

/* End of file Webgis.php */
