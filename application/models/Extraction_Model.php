<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Extraction_Model extends Pattern_Model
{
	public function add_question_extraction($id, $desc, $type, $id_project)
	{
		$id_type = null;
		$this->db->select('id_type');
		$this->db->from('types_question');
		$this->db->where('type', $type);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_type = $row->id_type;
		}

		$data = array(
			'id' => $id,
			'id_project' => $id_project,
			'description' => $desc,
			'type' => $id_type
		);

		$this->db->insert('question_extraction', $data);
	}

	public function add_option($id_qe, $desc, $id_project)
	{
		$id_de = null;
		$this->db->select('id_de');
		$this->db->from('question_extraction');
		$this->db->where('id', $id_qe);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_de = $row->id_de;
		}

		$data = array(
			'id_de' => $id_de,
			'description' => $desc
		);

		$this->db->insert('options_extraction', $data);
	}

	public function delete_extraction($id, $id_project)
	{
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$this->db->delete('question_extraction');
	}

	public function delete_option($id_qe, $desc, $id_project)
	{
		$id_de = null;
		$this->db->select('id_de');
		$this->db->from('question_extraction');
		$this->db->where('id', $id_qe);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_de = $row->id_de;
		}

		$this->db->where('id_de', $id_de);
		$this->db->where('description', $desc);
		$this->db->delete('options_extraction');
	}

	public function edit_de($id, $desc, $type, $old_id, $old_type, $id_project)
	{
		$id_de = null;
		$this->db->select('id_de');
		$this->db->from('question_extraction');
		$this->db->where('id', $old_id);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_de = $row->id_de;
		}

		$id_type = null;
		$this->db->select('id_type');
		$this->db->from('types_question');
		$this->db->where('type', $type);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_type = $row->id_type;
		}

		if ($old_type != "Text") {
			if ($type == "Text") {
				$this->db->where('id_de', $id_de);
				$this->db->delete('options_extraction');
			}
		}

		$data = array(
			'id' => $id,
			'id_project' => $id_project,
			'description' => $desc,
			'type' => $id_type
		);

		$this->db->where('id_de', $id_de);
		$this->db->update('question_extraction', $data);
	}

	public function edit_option($id_qe, $op, $old_op, $id_project)
	{
		$id_de = null;
		$this->db->select('id_de');
		$this->db->from('question_extraction');
		$this->db->where('id', $id_qe);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_de = $row->id_de;
		}

		$id_op = null;
		$this->db->select('id_option');
		$this->db->from('options_extraction');
		$this->db->where('description', $old_op);
		$this->db->where('id_de', $id_de);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_op = $row->id_option;
		}

		$data = array(
			'description' => $op
		);

		$this->db->where('id_option', $id_op);
		$this->db->update('options_extraction', $data);
	}

	public function get_paper_ex($id_paper, $id_project)
	{
		$ids_p_d = $this->get_ids_project_database($id_project);
		$ids_bibs = $this->get_ids_bibs($ids_p_d);

		$this->db->select('papers.*');
		$this->db->from('papers');
		$this->db->where('id', $id_paper);
		$this->db->where_in('id_bib', $ids_bibs);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$data['abstract'] = $row->abstract;
			$data['keywords'] = $row->keywords;
			$data['doi'] = $row->doi;
			$data['url'] = $row->url;
			$data['note'] = $row->note;
		}

		return $data;

	}

	public function edit_status_ex($id, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);

		$data = array(
			'status_extraction' => $status
		);

		$this->db->where('id_paper', $id_paper);
		$this->db->update('papers', $data);

	}

	private function get_id_qe($id, $id_project)
	{
		$this->db->select('id_de');
		$this->db->from('question_extraction');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_de;
		}

		return null;
	}

	private function get_id_op($op, $id_de)
	{
		$this->db->select('id_option');
		$this->db->from('options_extraction');
		$this->db->where('id_de', $id_de);
		$this->db->where('description', $op);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_option;
		}

		return null;
	}


	public function evaluation_ex($num_paper, $questions, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$data = array();
		$data2 = array();
		foreach ($questions as $value) {

			$id_qe = $this->get_id_qe($value[0], $id_project);

			if ($value[2] == "Text") {
				$data3['id_qe'] = $id_qe;
				$data3['id_paper'] = $id_paper;
				$data3['text'] = $value[1];
				array_push($data, $data3);
			} elseif ($value[2] == "Multiple Choice List") {
				foreach ($value[1] as $op) {
					$id_op = $this->get_id_op($op, $id_qe);
					$data4['id_qe'] = $id_qe;
					$data4['id_paper'] = $id_paper;
					$data4['id_option'] = $id_op;
					array_push($data2, $data4);
				}
			} else {
				$id_op = $this->get_id_op($value[1], $id_qe);
				$data4['id_qe'] = $id_qe;
				$data4['id_paper'] = $id_paper;
				$data4['id_option'] = $id_op;
				array_push($data2, $data4);
			}
		}

		if(sizeof($questions) == 0){
			$this->db->where('id_paper', $id_paper);
			$this->db->delete('evaluation_ex_txt');
			$this->db->where('id_paper', $id_paper);
			$this->db->delete('evaluation_ex_op');
		}

		if (sizeof($data) > 0) {
			$this->db->insert_batch('evaluation_ex_txt', $data);
		}
		if (sizeof($data2) > 0) {
			$this->db->insert_batch('evaluation_ex_op', $data2);
		}

	}
}
