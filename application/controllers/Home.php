<?php

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_permandian');
        
    }

    public function index()
    {
       $data = array(
        'title'      => 'Pemetaan Permandian',
        'permandian' => $this->m_permandian->tampil(),
        'isi'        => 'v_pemetaan'
       );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        
    }

}

/* End of file Controllername.php */
