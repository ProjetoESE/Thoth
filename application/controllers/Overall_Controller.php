<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Overall_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function add_domain()
	{
		$id_project = null;
		try {
			$domain = $this->input->post('domain');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->add_domain($domain, $id_project);

			$activity = "Added the domain " . $domain;
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
	public function delete_domain()
	{
		$id_project = null;
		try {
			$domain = $this->input->post('domain');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->delete_domain($domain, $id_project);

			$activity = "Deleted the domain " . $domain;
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
	public function edit_domain()
	{
		$id_project = null;
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->edit_domain($now, $old, $id_project);

			$activity = "Edited the domain " . $old . " for " . $now;
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
	public function add_language()
	{
		$id_project = null;
		try {
			$language = $this->input->post('language');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->add_language($language, $id_project);

			$activity = "Added the language " . $language;
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
	public function delete_language()
	{
		$id_project = null;
		try {
			$language = $this->input->post('language');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->delete_language($language, $id_project);

			$activity = "Deleted the language " . $language;
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
	public function add_study_type()
	{
		$id_project = null;
		try {
			$study_type = $this->input->post('study_type');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->add_study_type($study_type, $id_project);

			$activity = "Added the study type " . $study_type;
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
	public function delete_study_type()
	{
		$id_project = null;
		try {
			$study_type = $this->input->post('study_type');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->delete_study_type($study_type, $id_project);

			$activity = "Deleted the study type " . $study_type;
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
	public function add_keywords()
	{
		$id_project = null;
		try {
			$keywords = $this->input->post('keywords');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->add_keywords($keywords, $id_project);

			$activity = "Added the keywords " . $keywords;
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
	public function delete_keywords()
	{
		$id_project = null;
		try {
			$keywords = $this->input->post('keywords');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->delete_keywords($keywords, $id_project);

			$activity = "Deleted the keyword " . $keywords;
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
	public function edit_keywords()
	{
		$id_project = null;
		try {
			$now = $this->input->post('now');
			$old = $this->input->post('old');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->edit_keywords($now, $old, $id_project);

			$activity = "Edited the keywords " . $old . " for " . $now;
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
	public function add_date()
	{
		$id_project = null;
		try {
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Overall_Model");
			$this->Overall_Model->add_date($start_date, $end_date, $id_project);

			$activity = "Added the start date " . $start_date . " and end date " . $end_date;
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
