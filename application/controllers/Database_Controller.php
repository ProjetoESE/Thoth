<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_Controller extends CI_Controller
{
	public function index()
	{
	}

	public function add_database()
	{
		$id_project = null;
		try {
			$this->logged_in();
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->add_database($database, $id_project);

			$activity = "Added the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	public function delete_database()
	{
		$id_project = null;
		try {
			$this->logged_in();
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->delete_database($database, $id_project);

			$activity = "Deleted the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	public function new_database()
	{
		$id_project = null;
		try {
			$this->logged_in();
			$database = $this->input->post('database');
			$link = $this->input->post('link');
			$id_project = $this->input->post('id_project');
			$this->load->model("Database_Model");

			$this->Database_Model->new_database($database, $link, $id_project);

			$activity = "Added the database " . $database;
			$this->insert_log($activity, 1, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	private function insert_log($activity, $module, $id_project)
	{
		$this->load->model("User_Model");
		$this->User_Model->insert_log($activity, $module, $id_project);
	}

	private function logged_in()
	{
		if (!$this->session->logged_in) {
			redirect(base_url());
		}
	}
}
