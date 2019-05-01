<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Home_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function index()
	{
		load_templates('home', null);
	}
}
