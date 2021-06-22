<!-- REST API CONTORLLER DENGAN MODEL -->

<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */

class Laporanmitra extends CI_Controller{
    
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    
    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->__resTraitConstruct();
        $this->load->database();
        // $this->load->model('testModel/LaporanMitraModel');
       
    }

    // public function index_post(){
    //     $response = $this->LaporanMitraModel->perintah_simpan(
    //         $this->post('id_proposal'),
    //         $this->post('NIK'),
    //         $this->post('nama'),
    //         $this->post('no_hp'),
    //         $this->post('email'),
    //         $this->post('plafond'),
    //         $this->post('lama_pinjaman'),
    //         $this->post('status_pinjaman'),
    //         $this->post('tanggal_akad_pinjaman'),
    //         $this->post('jenis_usaha'),
    //         $this->post('nilai_pembayaran'),
    //         $this->post('pembayaran_ke'),
    //         $this->post('tanggal_bayar'),
    //         $this->post('jatuh_tempo')
    //     );

    //     $this->response($response);
    // }

    function index_post() {
        $data = array(
            $this->post('id_proposal'),
            $this->post('NIK'),
            $this->post('nama'),
            $this->post('no_hp'),
            $this->post('email'),
            $this->post('plafond'),
            $this->post('lama_pinjaman'),
            $this->post('status_pinjaman'),
            $this->post('tanggal_akad_pinjaman'),
            $this->post('jenis_usaha'),
            $this->post('nilai_pembayaran'),
            $this->post('pembayaran_ke'),
            $this->post('tanggal_bayar'),
            $this->post('jatuh_tempo')
                );
        $insert = $this->db->insert('tb_h2h_laporan_mitra', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    


}