<?php
class Barang extends CI_Model
{
    function select_barang()
    {
        return $this->db->get('barang');
    }

    function insert_barang($data)
    {
        $this->db->set("nama", $data['nama']);
        $this->db->set("deskripsi_barang", $data['deskripsi_barang']);
        $this->db->set("id_distributor", $data['id_distributor']);
        $this->db->set("harga", $data['harga']);
        $this->db->set("stok", $data['stok']);
        $this->db->set("foto", $data['foto']);
        $this->db->insert("barang");
    }
}
