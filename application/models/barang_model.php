<?php
class Barang_model extends CI_Model
{
    function select_barang()
    {
        $q = "SELECT t1.*, t2.id_distributor, t2.nama_perusahaan, t2.nama_distributor, t2.no_telp_distributor, t3.id_kategori, t3.nama_kategori, t3.kode_kategori FROM barang t1 JOIN distributor t2 ON t1.id_distributor=t2.id_distributor LEFT JOIN kategori t3 ON t1.id_kategori=t3.id_kategori";
        $query = $this->db->query($q);
        return $query;
    }

    function barang_pagging($limit, $start)
    {
        $query = $this->db->get('barang', $limit, $start);
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
        $q = "SELECT t1.*, t2.id_distributor, t2.nama_perusahaan, t2.nama_distributor, t2.no_telp_distributor, t3.id_kategori, t3.nama_kategori, t3.kode_kategori FROM barang t1 JOIN distributor t2 ON t1.id_distributor=t2.id_distributor LEFT JOIN kategori t3 ON t1.id_kategori=t3.id_kategori WHERE t1.id_barang = " . $id;
        $query = $this->db->query($q);
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
    }

    function barangbycategory($id)
    {
        $q = "SELECT t1.*, t2.id_distributor, t2.nama_perusahaan, t2.nama_distributor, t2.no_telp_distributor, t3.id_kategori, t3.nama_kategori, t3.kode_kategori FROM barang t1 JOIN distributor t2 ON t1.id_distributor=t2.id_distributor LEFT JOIN kategori t3 ON t1.id_kategori=t3.id_kategori WHERE t3.id_kategori = " . $id;
        $query = $this->db->query($q);
        return $query;
    }

    function findbarang($id_user, $id_barang)
    {
        $q = "SELECT * FROM keranjang WHERE id_barang = " . $id_barang . " AND id_user = " . $id_user;
        $query = $this->db->query($q);
        return $query->result();
    }

    function insertkeranjang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function updatekeranjang($data, $table)
    {
        $this->db->set($data);
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update($table);
    }

    function jumlahkeranjang($id)
    {
        $q = "SELECT SUM(jumlah) FROM keranjang WHERE id_user = " . $id;
        $query = $this->db->query($q);
        return $query->result();
    }

    function getkeranjangbyid($id)
    {
        $q = "SELECT t1.id_keranjang, t2.id_barang, t1.id_user, t1.jumlah, t1.total_harga, t2.nama_barang, t2.harga, t2.photo_barang FROM keranjang t1 LEFT JOIN barang t2 ON t1.id_barang = t2.id_barang WHERE t1.id_user = " . $id;
        $query = $this->db->query($q);
        return $query->result();
    }

    function getharga($id)
    {
        $q = "SELECT * FROM barang WHERE id_barang = " . $id;
        $query = $this->db->query($q);
        return $query->result();
    }

    function totalbelanja($id)
    {
        $q = "SELECT SUM(total_harga) FROM keranjang WHERE id_user = " . $id;
        $query = $this->db->query($q);
        return $query->result();
    }

    function hapus_keranjang($id)
    {
        $q = "DELETE FROM keranjang WHERE id_keranjang = " . $id;
        $this->db->query($q);
    }

    function lengkap($id)
    {
        $q = "SELECT * FROM pelanggan WHERE id_user=" . $id;
        $res = $this->db->query($q);
        return $res->result_array();
    }

    function getstock($id)
    {
        $q = "SELECT * FROM barang WHERE id_barang = " . $id;
        $res = $this->db->query($q);
        return $res->result();
    }

    function kurangistock($id_barang, $data)
    {
        $this->db->set($data);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang');
    }
    public function search_barang($nama)
    {
        $q = $this->db->query("CALL searchbarang('$nama')");
        return $q->result();
    }
}
