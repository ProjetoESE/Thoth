<?php
/**
 * Created by PhpStorm.
 * User: guilh
 * Date: 29/10/2018
 * Time: 09:45
 */

class User_Controller extends CI_Controller
{
	public function index()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
		load_templates('pages/dashboard',null);
	}

	public function profile(){
		if (!$this->session->logged_in) {
			redirect(base_url());
		}

		load_templates('pages/user/profile',null);
	}
}
