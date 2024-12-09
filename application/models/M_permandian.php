<?php

class M_permandian extends CI_Model {

    public function simpan($data)
    {
        $this->db->insert('tbl_permandian', $data);
        
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_permandian');
        $this->db->order_by('id_permandian', 'desc');
        return $this->db->get() ->result();  
    }

    
    public function detail($id_permandian)
    {
        $this->db->select('*');
        $this->db->from('tbl_permandian');
        $this->db->where('id_permandian', $id_permandian); 
        return $this->db->get()->row(); 
    }


    public function edit($data)
    {
        $this->db->where('id_permandian', $data['id_permandian']);
        $this->db->update('tbl_permandian', $data);  
    }

    public function hapus($data)
    {
        $this->db->where('id_permandian', $data['id_permandian']);
        $this->db->delete('tbl_permandian', $data);
    }

}

/* End of file ModelName.php */
