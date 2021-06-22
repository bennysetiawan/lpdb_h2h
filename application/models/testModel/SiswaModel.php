<?php

class SiswaModel extends CI_Model{
    //response jika filed ada yang kosong
    public function empty_response(){
        $response['status']=502;
        $response['error']=true;
        $response['message']='Field Tidak Boleh Kosong';
        return $response;
    
    }

    //funtion Mengambil data
    public function all_person(){
        $all = $this->db->get('siswa')->result();
        
        $response['status']=200;
        $response['error']=false;
        $response['data']=$all;
        return $response;

    }

    //function untuk insert data ke table siswa
    public function add_person($nama, $email, $password, $telepon, $pelajaran){
        
        //jika salah satu filed kosong
        if(empty($nama)||empty($email)||empty($password)||empty($telepon)||empty($pelajaran)){
            return $this->empty_response();
        }else{
            $data = array(
                "nama"      => $nama,
                "email"     => $email,
                "password"  => $password,
                "telepon"   => $telepon,
                "pelajaran" => $pelajaran
            );
            $insert = $this->db->insert('siswa',$data);

            if($insert){
                $response['status'] = 200;
                $response['error']  = false;
                $response['message']='Data Siswa Ditambahkan';
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data Siswa Gagal Ditambahkan.';
                return $response;
            }
        }

    }






}