<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Selection_Controller extends Pattern_Controller
{
	/**
	 *
	 */
	public function edit_status_selection()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$status = $this->input->post('status');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Selection_Model");
			$this->Selection_Model->edit_status_selection($id_paper, $status, $id_project);

			$activity = "Edited status selection to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function edit_status_selection_papers()
	{
		try {
			$ids_paper = $this->input->post('ids_paper');
			$id_project = $this->input->post('id_project');
			$status = $this->input->post('status');

			$this->validate_level($id_project, array(1, 3, 4));

			$this->load->model("Selection_Model");
			$this->Selection_Model->edit_status_selection_papers($ids_paper, $status, $id_project);

			$activity = "Edited status selection " . sizeof($ids_paper) . " papers";
			$this->insert_log($activity, 3, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
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

			$this->load->model("Selection_Model");
			$this->Selection_Model->edit_status_paper($id_paper, $status, $id_project);

			$activity = "Resolved conflict to paper " . $id_paper;
			$this->insert_log($activity, 3, $id_project);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 *
	 */
	public function evaluation_criteria()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$id_criteria = $this->input->post('id');
			$selected = $this->input->post('selected');
			$old_status = $this->input->post('old_status');

			$this->validate_level($id_project, array(1, 3));

			$this->load->model("Selection_Model");

			if ($selected === "true") {
				$this->Selection_Model->selected_criteria($id_paper, $id_criteria, $id_project);
				$activity = "Selected criteria " . $id_criteria . " to paper " . $id_paper;
				$this->insert_log($activity, 3, $id_project);
			} else {
				$this->Selection_Model->deselected_criteria($id_paper, $id_criteria, $id_project);
				$activity = "Deselected criteria " . $id_criteria . " to paper " . $id_paper;
				$this->insert_log($activity, 3, $id_project);
			}

			$data = $this->check_status($id_project, $id_paper, $old_status);

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
		}
	}

	/**
	 * @param $criterias
	 * @param $criterias_ev
	 * @return bool
	 */
	private function criteriaEquals($criterias, $criterias_ev)
	{
		$pre = 0;
		$sel = 0;
		foreach ($criterias as $ce) {
			if ($ce->get_pre_selected()) {
				$pre++;
				foreach ($criterias_ev as $ev) {
					if ($ce->get_id() == $ev->get_id()) {
						$sel++;
					}
				}
			}
		}

		return $pre == $sel;

	}

	/**
	 * @param $id_project
	 * @param $id_paper
	 * @param $old_status
	 * @return mixed
	 */
	private function check_status($id_project, $id_paper, $old_status)
	{
		$criterias['inclusion'] = $this->Selection_Model->get_criteria($id_project, 'Inclusion');
		$criterias['exclusion'] = $this->Selection_Model->get_criteria($id_project, 'Exclusion');
		$criterias_ev = $this->Selection_Model->get_evaluation_criteria($id_paper, $id_project);
		$in_rule = $this->Selection_Model->get_inclusion_rule($id_project);
		$ex_rule = $this->Selection_Model->get_exclusion_rule($id_project);
		$inclusion = false;
		$exclusion = false;

		switch ($in_rule) {
			case 'All':
				if (sizeof($criterias['inclusion']) == sizeof($criterias_ev['inclusion'])) {
					$inclusion = true;
				}
				break;
			case 'At Least':
				if ($this->criteriaEquals($criterias['inclusion'], $criterias_ev['inclusion'])) {
					$inclusion = true;
				}
				break;
			case 'Any':
				if (sizeof($criterias_ev['inclusion']) > 0) {
					$inclusion = true;
				}
				break;
		}

		switch ($ex_rule) {
			case 'All':
				if (sizeof($criterias['exclusion']) == sizeof($criterias_ev['exclusion'])) {
					$inclusion = false;
					$exclusion = true;
				}
				break;
			case 'At Least':
				if ($this->criteriaEquals($criterias['exclusion'], $criterias_ev['exclusion'])) {
					$exclusion = true;
					$inclusion = false;

				}
				break;
			case 'Any':
				if (sizeof($criterias_ev['exclusion'])) {
					$exclusion = true;
					$inclusion = false;
				}
				break;
		}

		$change = false;
		$data['status'] = $old_status;
		if ($old_status != 4 && $old_status != 5) {
			if ($inclusion && !$exclusion) {
				if ($old_status != 1) {
					$this->Selection_Model->edit_status_selection($id_paper, 1, $id_project);
					$change = true;
					$data['status'] = 1;
				}
			} elseif (!$inclusion && $exclusion) {
				if ($old_status != 2) {
					$this->Selection_Model->edit_status_selection($id_paper, 2, $id_project);
					$change = true;
					$data['status'] = 2;
				}
			} else {
				if ($old_status != 3) {
					$this->Selection_Model->edit_status_selection($id_paper, 3, $id_project);
					$change = true;
					$data['status'] = 3;
				}
			}
		}
		$data['change'] = $change;

		return $data;
	}

	/**
	 *
	 */
	public function update_note_selection()
	{
		try {
			$id_paper = $this->input->post('id_paper');
			$id_project = $this->input->post('id_project');
			$note = $this->input->post('note');

			$this->validate_level($id_project, array(1, 2, 3, 4));

			$this->load->model("Selection_Model");
			$this->Selection_Model->update_note_selection($id_paper, $note, $id_project);

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

			$this->load->model("Selection_Model");
			$data = $this->Selection_Model->get_paper_conflict($id, $id_project);

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function get_paper_selection()
	{
		try {
			$id = $this->input->post('id');
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1, 2, 3, 4));

			$this->load->model("Selection_Model");
			$data = $this->Selection_Model->get_paper_selection($id, $id_project);

			echo json_encode($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}
}
