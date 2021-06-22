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

class Deskreview extends CI_Controller{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }


    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();
        //$this->load->database();
        $this->load->model('testModel/DeskreviewModel');
    }

    // menampilkan data
    // GET  http://localhost/lpdb-h2h/index.php/deskreview
    public function index_get(){
        // $response = $this->SiswaModel-->all_person();
        $response = $this->DeskreviewModel->all_deskreview();
        var_dump($response);
        $this->response($response);
    }

    public function index_post(){

        $data_transaksi = array();

        $data_transaksi = json_decode(trim(file_get_contents('php://input')), true);

        foreach ($data_transaksi as $key => $value) {
                 var_dump("--> ini adalah key : " . $key . ", dan ini adalah valuenya : " . $value);
        }
        $this->response($data_transaksi, 200);
    }

}