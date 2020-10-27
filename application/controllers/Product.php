<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//$this->load->model('User_Model');
	}
	
	public function index()
	{
		$this->load->view('product_details');
	}
	public function payDetails()
	{
		$this->load->view('welcome_message');
	}
	public function paytmDetails(){
		$this->load->view('paytm');
	}
}
