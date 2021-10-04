<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller 
{
	public function index()
	{
        $data['pageName'] = "PAGEMISSING";
        $this->load->view('content_handler', $data);
	}
}