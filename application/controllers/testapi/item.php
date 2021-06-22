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

class Item extends CI_Controller{
    
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    
    function __construct(){
        parent::__construct();
        $this->__resTraitConstruct();
        //$this->load->database();
       
    }

    // method get http://localhost/lpdb-h2h/index.php/testapi/item
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $product = $this->db->get('m_item')->result();
        } else {
            $this->db->where('id_item', $id);
            $product = $this->db->get('m_item')->result();
        }
        $this->response($product, 200);
    }
    
    // method post http://localhost/lpdb-h2h/index.php/testapi/item
    function index_post() {
        //menggunakan form
        // $data = array(
        //     'id_item'   => $this->input->post('item_id'),
        //     'item_name' => $this->input->post('item_name'),
        //     'note'      => $this->input->post('item_note'),
        //     'stock'     => $this->input->post('item_stock'),
        //     'price'     => $this->input->post('item_price'),
        //     'unit'      => $this->input->post('item_unit')
        // );

        //menggunakan JSON
        $data = array(
            'id_item'   => $this->post('id_item'),
            'item_name' => $this->post('item_name'),
            'note'      => $this->post('note'),
            'stock'     => $this->post('stock'),
            'price'     => $this->post('price'),
            'unit'      => $this->post('unit')
        );

        $insert = $this->db->insert('m_item', $data);
        
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // method put
    // method put http://localhost/lpdb-h2h/index.php/testapi/item
    function index_put() {
        $id = $this->put('id_item');
        $data = array(
            'item_name' => $this->put('item_name'),
            'note'      => $this->put('note'),
            'stock'     => $this->put('stock'),
            'price'     => $this->put('price'),
            'unit'      => $this->put('unit')
        );
        $this->db->where('id_item', $id);
        $update = $this->db->update('m_item', $data);
        
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // method delete
    // ada penambahan di library >> REST_Controller.php pada protected function _parse_delete()
    // agar dengan format JSON bisa digunakan method DELETE
    // jika tidak ditambahkna, maka method DELETE hanya bisa digunakan dengan Form
    function index_delete() {
        $id = $this->delete('id_item');
        $this->db->where('id_item', $id);
        $delete = $this->db->delete('m_item');
        
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }



}