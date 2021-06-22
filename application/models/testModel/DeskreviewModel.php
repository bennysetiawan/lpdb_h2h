<?php

class DeskreviewModel extends CI_Model{

    //funtion Mengambil data
    public function all_deskreview(){
        $all = $this->db->get('tb_cmfs_desk_review')->result();
        
        $response['status']=200;
        $response['error']=false;
        $response['data']=$all;
        return $response;

    }




}