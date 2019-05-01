<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Help_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function index()
	{
		load_templates('pages/help', null);
	}

}
