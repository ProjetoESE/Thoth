<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_Controller extends CI_Controller
{
	public function index()
	{
	}

	public function add_database()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->add_database($database, $id_project);

			$activity = "Added the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function delete_database()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->delete_database($database, $id_project);

			$activity = "Deleted the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function new_database()
	{
		try {
			$database = $this->input->post('database');
			$link = $this->input->post('link');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->new_database($database, $link, $id_project);

			$activity = "Added the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	public function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}
}
