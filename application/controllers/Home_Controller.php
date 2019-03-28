<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

	public function index(){
		load_templates('home',null);
	}
}
