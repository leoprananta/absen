<?php
defined("BASEPATH") or die ("Script tidak bisa langsung");
class daftar_absensi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Divisi_model', 'divisi');
        
        $this->load->helper('Tanggal');
	}
	
	public function index(){
		
		$data['divisi']=$this->divisi->get_all();
		$this->template->load('template', 'daftar_absensi',$data);
		
	}
	
	
	
}

?>