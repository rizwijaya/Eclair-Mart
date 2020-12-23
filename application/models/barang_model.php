<?php
class Barang_model extends CI_Model
{
    function select_barang()
    {
        $query = $this->db->get('barang');
        return $query;
    }

    function select_category()
    {
        $query = $this->db->get('kategori');
        return $query;
    }

    function select_distributor()
    {
        $query = $this->db->get('distributor');
        return $query;
    }

    function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function select_barang_byid($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', $id);
        $query = $this->db->get();
        return $query;
    }
}
