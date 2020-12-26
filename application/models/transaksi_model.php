<?php
class Transaksi_model extends CI_Model
{
    function totalcheckout($id)
    {
        $q = "SELECT SUM(total_harga) FROM keranjang WHERE id_user = ".$id;
        $query = $this->db->query($q);
        return $query->result();
    }

    
    function insertcheckout($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function insertbarang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function getcheckout($id)
    {
        $q = "SELECT * FROM keranjang WHERE id_user=" . $id;
        $res = $this->db->query($q);
        return $res->result();   
    }

    function hapusallkeranjang($id)
    {
        $q = "DELETE FROM keranjang WHERE id_user = ".$id;
        $this->db->query($q);
    }

    function barangtransaksi($id)
    {
        $q = "SELECT t1.id_transaksi, t1.id_barang, t1.jumlah, t1.total_harga, t2.nama_barang, t2.harga, t2.photo_barang FROM checkout t1 LEFT JOIN barang t2 ON t1.id_barang=t2.id_barang WHERE t1.id_transaksi = " . $id;
        $res = $this->db->query($q);
        return $res->result();  
    }

    function getinvoice($id)
    {
        $q = "SELECT t1.id_transaksi, t1.total_bayar, t1.status_bayar, t1.tanggal_bayar, t1.batas_bayar, t2.nama, t2.email, t3.* FROM transaksi t1 JOIN users t2 ON t1.id_user=t2.id_user JOIN pelanggan t3 ON t2.id_user=t3.id_user WHERE t1.id_transaksi = " . $id;
        $res = $this->db->query($q);
        return $res->result();  
    }

    function gethistori($id)
    {
        $q = "SELECT * FROM transaksi WHERE id_user = " . $id. " AND total_bayar != 0 ORDER BY `id_transaksi` DESC";
        $res = $this->db->query($q);
        return $res->result();  
    }
}
