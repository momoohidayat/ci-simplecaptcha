<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller {

	
	function __construct()
    	{
    	parent::__construct();
    	$this->load->library('simplecaptcha');
    	}

	public function index()
	{
		$this->simplecaptcha->set_captcha_session();
		$this->load->view('example');
	}

	function display_captcha()
	{
		$this->simplecaptcha->create_captcha();
	}
}

/* End of file example.php */
/* Location: ./application/controllers/example.php */
