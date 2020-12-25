<?php
class Barang_model extends CI_Model
{
    function select_barang()
    {
        $q = "SELECT t1.*, t2.id_distributor, t2.nama_perusahaan, t2.nama_distributor, t2.no_telp_distributor, t3.id_kategori, t3.nama_kategori, t3.kode_kategori FROM barang t1 JOIN distributor t2 ON t1.id_distributor=t2.id_distributor LEFT JOIN kategori t3 ON t1.id_kategori=t3.id_kategori";
        $query = $this->db->query($q);
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

    function hapus_barang($id)
    {
        $this->db->query("call deletebarang('" . $id . "')");
    }

    function update_barang($id, $distributor, $nama_barang, $jumlah, $harga, $status, $kategori, $gambar, $deskripsi)
    {
        $this->db->query("call updatebarang('" . $id . "','" . $distributor . "'
         ,'" . $nama_barang . "'
         ,'" . $jumlah . "'
         ,'" .  $harga . "'
         ,'" . $status . "'
         ,'" . $kategori . "'
         ,'" . $gambar . "'
         ,'" . $deskripsi . "'
         )");

        // return  $this->db->query($store, $data);
        // foreach (da)
        //     'id_distributor'
        //     'nama_barang' 
        //     'jumlah' 
        //     'harga' 	
        //     'status_barang' 
        //     'id_kategori' 
        //     'photo_barang' 
        //     'deskripsi_barang'
    }
}
