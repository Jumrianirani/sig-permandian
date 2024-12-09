<?php


class permandian extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_permandian');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Permandian',
            'permandian' => $this->m_permandian->tampil(),
            'isi' => 'v_datapermandian'
           );
            $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {
       
        $this->form_validation->set_rules('nama_permandian', 'Nama_Permandian', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']   = './gambar/';
            $config['allowed_types'] = 'png|jpg|gif|jpeg|icon';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Input Data Permandian',
                    'error_upload' =>  $this->upload->display_errors(),
                    'isi' => 'v_input_datapermandian'
                   );
                    $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_permandian' => $this->input->post('nama_permandian'),
                    'alamat'          => $this->input->post('alamat'),
                    'latitude'        => $this->input->post('latitude'),
                    'longitude'       => $this->input->post('longitude'),
                    'ket'             => $this->input->post('ket'),
                    'gambar'          => $upload_data['uploads']['file_name'],
                );
                $this->m_permandian->simpan($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
                redirect('permandian/input');
            }
        }

        $data = array(
            'title' => 'Input Data Permandian',
            'isi' => 'v_input_datapermandian'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
 

    public function edit($id_permandian)
    {
        $this->form_validation->set_rules('nama_permandian', 'Nama_Permandian', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('ket', 'Keterangan', 'required',array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']   = './gambar/';
            $config['allowed_types'] = 'png|jpg|gif|jpeg|icon';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data Permandian',
                    'error_upload' =>  $this->upload->display_errors(),
                    'permandian'=> $this->m_permandian->detail($id_permandian),
                    'isi' => 'v_edit_datapermandian'
                   );
                    $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                 //edit dengan ubah gamabar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_permandian'   => $id_permandian,
                    'nama_permandian' => $this->input->post('nama_permandian'),
                    'alamat'          => $this->input->post('alamat'),
                    'latitude'        => $this->input->post('latitude'),
                    'longitude'       => $this->input->post('longitude'),
                    'ket'             => $this->input->post('ket'),
                    'gambar'          => $upload_data['uploads']['file_name'],
                );
                $this->m_permandian->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
                redirect('permandian');
            }
            //edit tampah gamabar
            $data = array(
                'id_permandian'   => $id_permandian,
                'nama_permandian' => $this->input->post('nama_permandian'),
                'alamat'          => $this->input->post('alamat'),
                'latitude'        => $this->input->post('latitude'),
                'longitude'       => $this->input->post('longitude'),
                'ket'             => $this->input->post('ket')
            );
            $this->m_permandian->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('permandian');
        }

        $data = array(
            'title' => 'Input Data Permandian',
            'permandian'=> $this->m_permandian->detail($id_permandian),
            'isi' => 'v_edit_datapermandian'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function hapus($id_permandian)
    {
        $data = array('id_permandian'=>$id_permandian);
        $this->m_permandian->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!');
        redirect('permandian');
    }

}

/* End of file Controllername.php */
