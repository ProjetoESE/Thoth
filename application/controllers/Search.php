<?php

class Search extends CI_Controller
{
	public function index(){

		$data['search'] = $this->input->get('search');
		load_templates('pages/search',$data);
	}
}