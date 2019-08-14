<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Quality_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function add_qa()
	{
		$id_project = null;
		try {
			$id = $this->input->post('id');
			$qa = $this->input->post('qa');
			$weight = $this->input->post('weight');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->add_qa($id, $qa, $weight, $id_project);

			$activity = "Added the question quality " . $id;
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
	public function delete_qa()
	{

		$id_project = null;
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->delete_qa($id, $id_project);

			$activity = "Deleted the question quality " . $id;
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
	public function add_score_quality()
	{
		$id_project = null;
		try {
			$score_rule = $this->input->post('score_rule');
			$score = $this->input->post('score');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$id_qa = $this->input->post('id_qa');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->add_score_quality($score_rule, $score, $description, $id_project, $id_qa);

			$activity = "Added the score quality " . $score_rule;
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
	public function edit_min_score_qa()
	{
		$id_project = null;
		try {
			$score = $this->input->post('min');
			$id = $this->input->post('qa');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_min_score_qa($score, $id, $id_project);

			$activity = "Edited the minimum score quality " . $id;
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
	public function delete_score_quality()
	{
		$id_project = null;
		try {
			$score = $this->input->post('score');
			$id = $this->input->post('id_qa');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->delete_score_quality($score, $id, $id_project);

			$activity = "Deletes the score quality " . $score;
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
	public function edit_qa()
	{
		$id_project = null;
		try {
			$id = $this->input->post('id');
			$qa = $this->input->post('qa');
			$weight = $this->input->post('weight');
			$id_project = $this->input->post('id_project');
			$old_id = $this->input->post('old_id');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_qa($id, $qa, $weight, $old_id, $id_project);

			$activity = "Edited the question quality " . $id;
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
	public function edit_score_quality()
	{
		$id_project = null;
		try {
			$score_rule = $this->input->post('score_rule');
			$old_score_rule = $this->input->post('old_score_rule');
			$score = $this->input->post('score');
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');
			$id_qa = $this->input->post('id_qa');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_score_quality($score_rule, $old_score_rule, $score, $description, $id_project, $id_qa);

			$activity = $this->session->name . "Edited the score quality " . $score_rule;
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
	public function add_general_quality_score()
	{
		$id_project = null;
		try {
			$start_interval = $this->input->post('start_interval');
			$id_project = $this->input->post('id_project');
			$end_interval = $this->input->post('end_interval');
			$general_score_desc = $this->input->post('general_score_desc');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->add_general_quality_score($start_interval, $end_interval, $general_score_desc, $id_project);

			$activity = "Added general quality score " . $general_score_desc;
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
	public function delete_general_quality_score()
	{
		$id_project = null;
		try {
			$description = $this->input->post('description');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->delete_general_quality_score($description, $id_project);

			$activity = "Deleted general quality score " . $description;
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
	public function edit_general_score()
	{
		$id_project = null;
		try {
			$description = $this->input->post('desc');
			$id_project = $this->input->post('id_project');
			$old_desc = $this->input->post('old_desc');
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_general_score($description, $start, $end, $old_desc, $id_project);

			$activity = "Edited general quality score " . $description;
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
	public function edit_min_score()
	{
		$id_project = null;
		try {
			$score = $this->input->post('score');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_min_score($score, $id_project);

			$activity = "Edited min general quality score to approved " . $score;
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
	public function get_paper_qa()
	{
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 2, 3, 4));

			$this->load->model("Quality_Model");
			$data = $this->Quality_Model->get_paper_qa($id, $id_project);

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function edit_status_qa()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$status = $this->input->post('status');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_status_qa($id_paper, $status, $id_project);

			$activity = "Edited status quality to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function evaluation_qa()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$id_qa = $this->input->post('id_qa');
			$score = $this->input->post('score');

			$this->validate_level($id_project, array(1, 3));

			$this->load->model("Quality_Model");

			$this->Quality_Model->selected_qa_score($id_paper, $id_qa, $score, $id_project);
			$data = $this->Quality_Model->calculate_score_qa_mem($id_paper, $id_project);
			$this->Quality_Model->check_status_qa($id_paper, $id_project);

			$activity = "Selected score " . $score . " to quality question " . $id_qa . " to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);
			if ($data['change']) {
				$activity = "Edited status quality to paper " . $id_paper;
				$this->insert_log($activity, 3, $id_project);
			}

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function evaluation_qa_conf()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$id_qa = $this->input->post('id_qa');
			$score = $this->input->post('score');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");

			$this->Quality_Model->selected_qa_score_conf($id_paper, $id_qa, $score, $id_project);
			$data = $this->Quality_Model->calculate_score_qa($id_paper, $id_project);

			$activity = "Selected score " . $score . " to quality question " . $id_qa . " to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);
			if ($data['change']) {
				$activity = "Edited status quality to paper " . $id_paper;
				$this->insert_log($activity, 3, $id_project);
			}

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function update_note_qa()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$note = $this->input->post('note');

			$this->validate_level($id_project, array(1, 2, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->update_note_qa($id_paper, $note, $id_project);

			$activity = "Update note to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);


		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function get_paper_conflict()
	{
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 2, 3, 4));

			$this->load->model("Quality_Model");
			$data = $this->Quality_Model->get_paper_conflict($id, $id_project);

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function edit_status_paper()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$status = $this->input->post('status');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Quality_Model");
			$this->Quality_Model->edit_status_paper($id_paper, $status, $id_project);

			$activity = "Resolved conflict to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}
}

