<!-- REST API CONTORLLER DENGAN MODEL -->

<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

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

class Host extends CI_Controller
{

    use REST_Controller {
    REST_Controller::__construct as private __resTraitConstruct;
    }


    function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        //$this->load->database();
        $this->load->model('testModel/DeskreviewModel');
    }

    // menampilkan data
    // GET  http://localhost/lpdb-h2h/index.php/deskreview
    public function index_get()
    {
        // $response = $this->SiswaModel-->all_person();
        $response = $this->DeskreviewModel->all_deskreview();
        var_dump($response);
        $this->response($response);
    }

    public function index_post()
    {

        $servername = "db-sadewa.lpdb.id";
        $username = "cfms";
        $password = "dbcfms2019";
        $dbname = "dbname_coba";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $data_transaksi = array(
            'id_proposal'               => $this->post('id_proposal'),
            'nik'                       => $this->post('nik'),
            'npwp'                       => $this->post('npwp'),
            'nama'                      => $this->post('nama'),
            'no_hp'                     => $this->post('no_hp'),
            'email'                     => $this->post('email'),
            'plafond'                   => $this->post('plafond'),
            'lama_pinjaman'             => $this->post('lama_pinjaman'),
            'status_pinjaman'           => $this->post('status_pinjaman'),
            'tgl_akad_pinjaman'         => $this->post('tgl_akad_pinjaman'),
            'jenis_usaha'               => $this->post('jenis_usaha'),
            'nilai_pembayaran'          => $this->post('nilai_pembayaran'),
            'pembayaran_ke'             => $this->post('pembayaran_ke'),
            'tgl_bayar'                 => $this->post('tgl_bayar'),
            'tgl_jatuh_tempo'           => $this->post('tgl_jatuh_tempo')
        );

        $list_data_transaksi = json_decode(trim(file_get_contents('php://input')), true);

        //var_dump($list_data_transaksi);

        foreach ($list_data_transaksi as $data) {
            $sql = "INSERT INTO tb_h2h_master_enduser (

                    id_proposal,
                    nik,
                    npwp,
                    nama,
                    no_hp,
                    email,
                    plafond,
                    lama_pinjaman,
                    status_pinjaman,
                    tgl_akad_pinjaman,
                    jenis_usaha,
                    nilai_pembayaran,
                    pembayaran_ke,
                    tgl_bayar,
                    tgl_jatuh_tempo

                )
                    VALUES ( "

                . $data['id_proposal'] . " , "
                . $data['nik'] . " , "
                . $data['npwp'] . " , "
                . $data['nama'] . " , "
                . $data['no_hp'] . " , "
                . $data['email'] . " , "
                . $data['plafond'] . " , "
                . $data['lama_pinjaman'] . " , "
                . $data['status_pinjaman'] . " , "
                . $data['tgl_akad_pinjaman'] . " , "
                . $data['jenis_usaha'] . " , "
                . $data['nilai_pembayaran'] . " , "
                . $data['pembayaran_ke'] . " , "
                . $data['tgl_bayar'] . " , "
                . $data['tgl_jatuh_tempo'] . ") ON DUPLICATE KEY UPDATE " .

                "id_proposal = " . $data['id_proposal'] . ", " .
                "nik = " . $data['nik'] . ", " .
                "npwp = " . $data['npwp'] . ", " .
                "nama = " . $data['nama'] . ", " .
                "no_hp = " . $data['no_hp'] . ", " .
                "email = " . $data['email'] . ", " .
                "plafond = " . $data['plafond'] . ", " .
                "lama_pinjaman = " . $data['lama_pinjaman'] . ", " .
                "status_pinjaman = " . $data['status_pinjaman'] . ", " .
                "tgl_akad_pinjaman = " . $data['tgl_akad_pinjaman'] . ", " .
                "jenis_usaha = " . $data['jenis_usaha'] . ", " .
                "nilai_pembayaran = " . $data['nilai_pembayaran'] . ", " .
                "pembayaran_ke = " . $data['pembayaran_ke'] . ", " .
                "tgl_bayar = " . $data['tgl_bayar'] . ", " .
                "tgl_jatuh_tempo = " . $data['tgl_jatuh_tempo'];
            //$insert = $this->db->autoExecute('tb_h2h_laporan_mitra', $data);

            var_dump($sql);
            $conn->query($sql);
        }

        $conn->close();
        /*
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }

        */

        $this->response($list_data_transaksi, 200);

        //$this->response($data_transaksi, 200);
    }
}
