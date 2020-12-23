<?php
class Barang_model extends CI_Model
{
    function select_barang()
    {
        $query = $this->db->get('barang');
        return $query;
    }
}
