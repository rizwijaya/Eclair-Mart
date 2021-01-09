<?php
class Pegawai_model extends CI_Model
{
    function select_distributor()
    {
        $query = $this->db->get('distributor');
        return $query;
    }

    function tambah_distributor($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_distributor($data)
    {
        $this->db->query("CALL updatedistributor('" . $data['id_distributor'] . "','" . $data['nama_perusahaan'] . "','" . $data['nama_distributor'] . "','" . $data['no_telp_distributor'] . "'," . $data['status_distributor'] . ")");
        //proses pengerjaan
        //CALL updatedistributor(2, 'PT Coca', 'Rahmawati', 085473849321, 0);
    }

    function kategori()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    function hapus_kategori($id)
    {
        $this->db->query("CALL deletekategori('" . $id . "')");
    }

    function hapus_distributor($id)
    {
        $this->db->query("CALL deletedistributor('" . $id . "')");
    }

    function daftarpelanggan()
    {
        $q = "SELECT t1.nama, t1.email, t2.alamat_pelanggan, t2.no_telp_pelanggan, t2.photo_pelanggan FROM users t1 LEFT JOIN pelanggan t2 ON t1.id_user=t2.id_user WHERE t1.id_grup = 3";
        $query = $this->db->query($q);
        return $query;
    }

    function daftarpegawai()
    {
        $q = "SELECT t1.nama, t1.email, t2.alamat_pegawai, t2.no_telp_pegawai FROM users t1 LEFT JOIN pegawai t2 ON t1.id_user=t2.id_user WHERE t1.id_grup = 2";
        $query = $this->db->query($q);
        return $query;
    }

    function tambah_kategori($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_kategori($data)
    {
        $this->db->query("CALL updatekategori('" . $data['id_kategori'] . "','" . $data['kode_kategori'] . "','" . $data['nama_kategori'] . "')");
    }

    function pembayaran($status)
    {
        $q = "SELECT t1.id_transaksi, t1.bukti_bayar, t1.total_bayar, t1.status_bayar, t1.tanggal_bayar, t1.batas_bayar, t2.nama, t2.email, t3.* FROM transaksi t1 JOIN users t2 ON t1.id_user=t2.id_user JOIN pelanggan t3 ON t2.id_user=t3.id_user WHERE t1.status_bayar = " . $status;
        $query = $this->db->query($q);
        return $query->result();
    }

    function transaksi()
    {
        $q = "SELECT t1.id_transaksi, t1.bukti_bayar, t1.total_bayar, 
        t1.status_bayar, t1.tanggal_bayar, t1.batas_bayar, t2.nama,
         t2.email, t3.* FROM transaksi t1 
         JOIN users t2 ON t1.id_user=t2.id_user 
         JOIN pelanggan t3 ON t2.id_user=t3.id_user 
         WHERE t1.status_bayar = 3 OR t1.status_bayar = 4 OR t1.status_bayar = 5";
        $query = $this->db->query($q);
        return $query->result();
    }
}
