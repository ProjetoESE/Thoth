<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('load_templates'))
{
	function load_templates($var){
		$ci=& get_instance();
		$ci->load->view('templates/header');
		$ci->load->view('templates/menu');
		$ci->load->view($var);
		$ci->load->view('templates/footer');
	}
}
