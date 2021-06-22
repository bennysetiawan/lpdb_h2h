<!-- REST API CONTORLLER DENGAN MODEL Dan SP -->

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

class Spdeskreview extends CI_Controller{
    
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    
    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();
        //$this->load->database();
        $this->load->model('testModel/SpDeskreviewModel');
    }

    // menampilkan data
    // GET http://localhost/lpdb-h2h/index.php/testapi/spdeskreview
    public function index_get(){
        // $response = $this->SiswaModel-->all_person();
        $response = $this->SpDeskreviewModel->tampil();
        $this->response($response);
    }


}