<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Search_String_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function add_term()
	{
		$id_project = null;
		try {
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->add_term($term, $id_project);

			$activity = "Added the term" . $term;
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

	/**
	 *
	 */
	public function delete_term()
	{
		$id_project = null;
		try {
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->delete_term($term, $id_project);

			$activity = "Deleted the term" . $term;
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

	/**
	 *
	 */
	public function edit_term()
	{
		$id_project = null;
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->edit_term($now, $old, $id_project);

			$activity = "Edited the term " . $old . " for " . $now;
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

	/**
	 *
	 */
	public function add_synonym()
	{
		$id_project = null;
		try {
			$term = $this->input->post('term');
			$syn = $this->input->post('syn');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->add_synonym($syn, $term, $id_project);

			$activity = "Added the synonym" . $syn;
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

	/**
	 *
	 */
	public function delete_synonym()
	{
		$id_project = null;
		try {
			$term = $this->input->post('term');
			$syn = $this->input->post('syn');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->delete_synonym($syn, $term, $id_project);

			$activity = "Deleted the synonym" . $syn;
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

	/**
	 *
	 */
	public function edit_synonym()
	{
		$id_project = null;
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$term = $this->input->post('term');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->edit_synonym($now, $old, $term, $id_project);

			$activity = "Edited the synonym " . $old . " for " . $now;
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

	/**
	 *
	 */
	public function generate_string()
	{
		$id_project = null;
		try {
			$database = $this->input->post('database');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$string = null;
			$data = $this->Search_String_Model->get_terms_and_syn($id_project);

			switch ($database) {
				case "SCOPUS":
					$string = 'TITLE-ABS-KEY ';
					break;
				case "IEEE":
					$string = '';
					break;
				case "SCIENCE DIRECT":
					$string = '';
					break;
				case "ENGINEERING VILLAGE":
					$string = '(';
					break;
				case "ACM":
					$string = '';
					break;
				case "SPRINGER LINK":
					$string = '';
					break;
				default:
					break;
			}

			$count = 0;
			foreach ($data as $term) {
				if ($count > 0) {
					$string .= " AND ";
				}
				if ($database == "ENGINEERING VILLAGE") {
					$string .= '(';
				}
				$string .= "(";

				if (preg_match('/\s/', $term->get_description())) {
					$string .= '"' . $term->get_description() . '"';
				} else {
					$string .= $term->get_description();
				}

				foreach ($term->get_synonyms() as $synonym) {

					if ($database == "ACM") {
						$string .= " ";
					} else {
						$string .= " OR ";
					}
					if (preg_match('/\s/', $synonym)) {
						$string .= '"' . $synonym . '"';
					} else {
						$string .= $synonym;
					}
				}
				$string .= ")";
				if ($database == "ENGINEERING VILLAGE") {
					$string .= ' WN KY)';
				}
				$count++;
			}
			if ($database == "ENGINEERING VILLAGE") {
				$string .= ' AND ({english} WN LA)';
			}

			if ($database != "Generic") {

				$id_project_database = $this->Search_String_Model->get_id_project_database($database, $id_project);
				$this->Search_String_Model->generate_string($string, $id_project_database);

			} else {
				$this->Search_String_Model->generate_string_generic($string, $id_project);
			}


			$activity = "Generated search string " . $database;
			$this->insert_log($activity, 1, $id_project);

			echo $string;

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			if (is_null($id_project) || empty($id_project)) {
				redirect(base_url());
			} else {
				redirect(base_url('planning/' . $id_project));
			}
		}
	}

	/**
	 *
	 */
	public function edit_search_strategy()
	{
		$id_project = null;
		try {
			$search_strategy = $this->input->post('search_strategy');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Search_String_Model");
			$this->Search_String_Model->edit_search_strategy($search_strategy, $id_project);

			$activity = "Edited search strategy";
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
}
