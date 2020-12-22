<?php
class Barang extends CI_Model
{
    function select_barang()
    {
        $query = $this->db->get('barang');
        return $this->db->get('barang');
    }
}
