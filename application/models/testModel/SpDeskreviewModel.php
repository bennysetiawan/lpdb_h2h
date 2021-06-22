<?php

class SpDeskreviewModel extends CI_Model{


    public function tampil(){
        $query = "CALL SP_VIEW_PROPOSAL(?, ?)";
        $data = array('JENIS'=>'Konvensional', 'BAGIAN'=>'Bisnis II.1');
        //mysqli_next_result($this->db->conn_id);
        $result = $this->db->query($query, $data)->result();
        
        if ($result !== NULL) {
            $response['status']=200;
            $response['error']=false;
            $response['data']=$result;
            return $response;
        }
        return FALSE;

        // $sql_query=$this->db->query(
        //     "call SP_VIEW_PROPOSAL(?,?)",
        //     array('jenis'=>'Konvensional', 'bagian'=>'Binis II.1')
        //     )->result();                     
       

        //     $response['status']=200;
        //     $response['error']=false;
        //     $response['data']=$sql_query;
        //     return $response;
    }


}