<?php

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Import_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function bib_upload()
	{
		try {
			$papers = $this->input->post('papers');
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$name = $this->input->post('name');

			$this->validate_level($id_project, array(1, 3));

			$this->load->model("Import_Model");
			$this->Import_Model->bib_upload($papers, $database, $name, $id_project);

			$activity = "Added " . sizeof($papers) . " papers at " . $database . " for file " . $name;
			$this->insert_log($activity, 3, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}

	}

	/**
	 *
	 */
	public function delete_bib()
	{
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');
			$name = $this->input->post('name');

			$this->validate_level($id_project, array(1, 3));

			$this->load->model("Import_Model");
			$papers = $this->Import_Model->delete_bib($database, $name, $id_project);

			$activity = "Delete papers at " . $database . " for file " . $name;
			$this->insert_log($activity, 3, $id_project);
			echo $papers;
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}

	}
}
