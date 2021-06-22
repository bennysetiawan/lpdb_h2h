<?php

class LaporanMitraModel extends CI_Model{

    //funtion insert data
    public function perintah_simpan($id_proposal, $NIK, $nama, $no_hp, $email, $plafond, $lama_pinjaman, $status_pinjaman, 
    $tanggal_akad_pinjaman, $jenis_usaha, $nilai_pembayaran, $pembayaran_ke, $tanggal_bayar, $jatuh_tempo){
        
        //jika salah satu filed kosong
     
            $data = array(
                "id_proposal"   => $id_proposal,
                "NIK"           => $NIK,
                "nama"      => $nama,
                "no_hp"     => $no_hp,
                "email"     => $email,
                "plafond"   => $plafond,
                "lama_pinjaman" => $lama_pinjaman,
                "status_pinjaman" => $status_pinjaman,
                "tanggal_akad_pinjaman" => $tanggal_akad_pinjaman,
                "jenis_usaha" => $jenis_usaha,
                "nilai_pembayaran" => $nilai_pembayaran,
                "pembayaran_ke" => $pembayaran_ke,
                "tanggal_bayar" => $tanggal_bayar,
                "jatuh_tempo" => $jatuh_tempo,
            );
            $insert = $this->db->insert('tb_h2h_laporan_mitra',$data);

            if($insert){
                $response['status'] = 200;
                $response['error']  = false;
                $response['message']='Data Laporan Mitra Berhasil Ditambahkan';
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data Laporan Mitra Gagal Ditambahkan.';
                return $response;
            }
    

    }




}