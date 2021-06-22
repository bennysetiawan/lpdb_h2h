<!-- REST API CONTORLLER TANPA MODEL -->

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
class Kontak extends CI_Controller{
    
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->__resTraitConstruct();
        $this->load->database();
    }

    //fungsi GET table kontak
    function index_get(){
        $id = $this->get('id');

        if($id == ''){
            $kontak = $this->db->get('telepon')->result();
        }else{
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        
        $this->response($kontak, 200);
    }
    
    //fungsi POST table kontak
    function index_post(){
        $data = array(
            'id'    => $this->post('id'),
            'nama'  => $this->post('nama'),
            'nomor' => $this->post('nomor')
        );

        $insert = $this->db->insert('telepon', $data);

        if($insert) {
            $this->response($data, 200);
        }else{
            $this->response(array
                    ('status' => 'fail', 502)
                );
        }
    }

    //fungsi PUT table kontak
    function index_put(){
        $id = $this->put('id');
        
        $data = array(
            'id'    => $this->put('id'),
            'nama'  => $this->put('nama'),
            'nomor' => $this->put('nomor')
        );

        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);

        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array
                    ('status' => 'fail', 502)
                );
        }
    }

    //fungsi DELETE table kontak
    function index_delete(){
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');

        if($delete){
            $this->response(array
                ('status' => 'success'), 201
            );
        }else{
            $this->response(array
                ('status' => 'fail'), 502 
            );
        }

    }

}