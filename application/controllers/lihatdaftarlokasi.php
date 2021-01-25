<?php
defined("BASEPATH") or die ("Script tidak bisa langsung");
class lihatdaftarlokasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index(){
		
		return $this->template->load('template', 'test1');

	}
	
	public function testtest($fff){
		echo ($fff);
		
	}
	
	
}

?>