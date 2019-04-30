<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria_Model extends CI_Model
{
	public function edit_exclusion_rule($rule, $id_project)
	{

		$id_rule = null;

		$this->db->select('id_rule');
		$this->db->from('rule');
		$this->db->where('description', $rule);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_rule = $row->id_rule;
		}

		$data = array(
			'id_rule' => $id_rule
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('exclusion_rule', $data);
	}

	public function edit_inclusion_rule($rule, $id_project)
	{

		$id_rule = null;

		$this->db->select('id_rule');
		$this->db->from('rule');
		$this->db->where('description', $rule);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_rule = $row->id_rule;
		}

		$data = array(
			'id_rule' => $id_rule
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('inclusion_rule', $data);
	}

	public function add_criteria($id, $description, $pre_selected, $id_project, $type)
	{
		$data = array(
			'id' => $id,
			'id_project' => $id_project,
			'description' => $description,
			'pre_selected' => $pre_selected,
			'type' => $type
		);

		$this->db->insert('criteria', $data);
	}

	public function selected_pre_select($id, $pre_selected, $id_project)
	{
		$val = false;

		if ($pre_selected == "true") {
			$val = true;
		}

		$data = array(
			'pre_selected' => $val
		);

		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$this->db->update('criteria', $data);

	}

	public function delete_criteria($id, $id_project)
	{

		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$this->db->delete('criteria');
	}

	public function update_criteria($old_id, $id, $description, $pre_selected, $id_project, $type)
	{
		$val = false;

		if ($pre_selected == "true") {
			$val = true;
		}

		$data = array(
			'pre_selected' => $val,
			'id' => $id,
			'description' => $description,
			'type' => $type
		);

		$this->db->where('id_project', $id_project);
		$this->db->where('id', $old_id);
		$this->db->update('criteria', $data);
	}

}
