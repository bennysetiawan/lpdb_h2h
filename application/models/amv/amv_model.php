<?php

class Amv_model extends CI_Model
{
    public function get_amv()
    {
        $panggilsp = "CALL SP_H2H_MASTER_END_USER()";
        // $data = array("JENIS" => "Konvensional", "BAGIAN" => "Bisnis II.1");

        $hasil = $this->db->query($panggilsp)->result();

        if ($hasil !== null) {
            $response['status'] = 200;
            $response['error'] = false;
            $response['data'] = $hasil;
            return $response;
        }
        return false;
    }
}
