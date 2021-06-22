## INSTALASI CODEIGNITER LIBRARY REST API
1.  download dan install xampp v7.1.30
    >> https://www.apachefriends.org/download.html
2.  download codeigniter v3.1.10 dan extract foldernya
    >> https://www.codeigniter.com/user_guide/installation/downloads.html
3.  download library rest-api dan extract foldernya
    >> https://github.com/chriskacerguis/codeigniter-restserver
4.  buka folder library rest-api yang sudah di download dan copy semua folder pada
    >> codeigniter-restserver-master\application
5.  paste folder ke dalam folder codeigniter yang tadi sudah di download, replace jika ada pilihan replace
    >> CodeIgniter-3.1.10\application
6.  rename folder CodeIgniter-3.1.10  dengan nama "lpdb-h2h"
7.  buka viscode > open folder lpdb-h2h 
8.  buka file
    :: application/libraries/REST_Controller.php
    
    >> dibawah code 
        ## defined('BASEPATH') OR exit('No direct script access allowed'); ##
    >> tambahkan code
        ## require APPPATH . 'libraries/REST_Controller_Definitions.php'; ##

9.  buka file
    :: application/controllers/api/Example.php
    
    >> ubah code 
        ## class Example extends REST_Controller { ##
    >> menjadi code
        ## class Example extends CI_Controller { ##

    Configurasi perubahan code lebih detail bisa di lihat di
    >>  https://stackoverflow.com/questions/56824024/class-example-cannot-extend-from-trait-restserver-libraries-rest-controller

bennys2016