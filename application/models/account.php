<?php
class Account extends CI_Model
{
    function insertNewUser($data)
    {
        $this->db->set("nama", $data['nama']);
        $this->db->set("email", $data['email']);
        $this->db->set("password", $data['password']);
        $this->db->set("id_grup", $data['id_grup']);

        $this->db->insert("users");

        $id_user =  $this->db->insert_id();
        $peran = $data['id_grup'];

        if($peran == 3) { //Pelanggan
            //Memasukkan data ke pelanggan
            $this->db->set("id_user", $id_user);   
            $this->db->insert("pelanggan");
        } elseif($peran == 2) { //Pegawai
            //Memasukkan data ke pegawai
            $this->db->set("id_user", $id_user);
            $this->db->set("alamat_pegawai", $data['alamat_pegawai']);
            $this->db->set("no_telp_pegawai", $data['no_telp_pegawai']);   
            $this->db->insert("pegawai");
        } elseif($peran ==1) {//pemilik
            //Memasukkan data ke pemilik
            $this->db->set("id_user", $id_user);   
            $this->db->insert("pemilik");
        }
    }

    function checklogin($email, $password)
    {
       $result = $this->db->where('email', $email)
                            ->limit(1)
                            ->get('users');
        if ($result->num_rows() > 0) {
            $hash = $result->row('password');
            if (password_verify($password,$hash)){
                return $result->result_array(); 
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
