<?php
class Pegawai_model extends CI_Model
{
    function select_distributor()
    {
        $query = $this->db->get('distributor');
        return $query;
    }
}
