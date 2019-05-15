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

	private function get_ev_ex_text($num_paper, $id_project)
	{
		$qes = array();
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$all_qes = $this->get_qes($id_project);

		foreach ($all_qes as $qe) {
			if ($qe->get_type() == "Text") {
				$text = "";
				$id_qe = $this->get_id_qe($qe->get_id(), $id_project);
				$this->db->select('text');
				$this->db->from('evaluation_ex_txt');
				$this->db->join('question_extraction', 'question_extraction.id_de = evaluation_ex_txt.id_qe');
				$this->db->where('id_paper', $id_paper);
				$this->db->where('id_qe', $id_qe);
				$query = $this->db->get();

				foreach ($query->result() as $row) {
					$text = $row->text;
				}
				array_push($qes, array($qe->get_id(), $text));
			}

		}


		return $qes;
	}

	private function get_ev_ex_select($num_paper, $id_project)
	{
		$qes = array();
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		$all_qes = $this->get_qes($id_project);

		foreach ($all_qes as $qe) {
			if ($qe->get_type() == "Pick One List") {
				$op = "";
				$id_qe = $this->get_id_qe($qe->get_id(), $id_project);
				$this->db->select('options_extraction.description as op');
				$this->db->from('evaluation_ex_op');
				$this->db->join('question_extraction', 'question_extraction.id_de = evaluation_ex_op.id_qe');
				$this->db->join('options_extraction', 'options_extraction.id_option = evaluation_ex_op.id_option');
				$this->db->where('id_paper', $id_paper);
				$this->db->where('id_qe', $id_qe);
				$query = $this->db->get();

				foreach ($query->result() as $row) {
					$op = $row->op;
				}
				array_push($qes, array($qe->get_id(), $op));
			}
		}


		return $qes;
	}

	private function get_ev_ex_check($num_paper, $id_project)
	{
		$qes = array();
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$all_qes = $this->get_qes($id_project);

		foreach ($all_qes as $qe) {
			if ($qe->get_type() == "Multiple Choice List") {
				$options = array();
				$id_qe = $this->get_id_qe($qe->get_id(), $id_project);
				$this->db->select('options_extraction.description as op');
				$this->db->from('evaluation_ex_op');
				$this->db->join('question_extraction', 'question_extraction.id_de = evaluation_ex_op.id_qe');
				$this->db->join('options_extraction', 'options_extraction.id_option = evaluation_ex_op.id_option');
				$this->db->where('id_paper', $id_paper);
				$this->db->where('id_qe', $id_qe);
				$query = $this->db->get();
				foreach ($query->result() as $row) {
					array_push($options, $row->op);
				}
				array_push($qes, array($qe->get_id(), $options));
			}
		}


		return $qes;
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

		$data['text'] = $this->get_ev_ex_text($id_paper, $id_project);
		$data['check'] = $this->get_ev_ex_check($id_paper, $id_project);
		$data['select'] = $this->get_ev_ex_select($id_paper, $id_project);

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

	private function get_ev_txt($id_paper, $id_qe)
	{
		$this->db->select('id_ev_txt');
		$this->db->from('evaluation_ex_txt');
		$this->db->where('id_qe', $id_qe);
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_ev_txt;
		}

		return null;
	}

	private function get_ev_op($id_paper, $id_qe)
	{
		$this->db->select('ev_ex_op');
		$this->db->from('evaluation_ex_op');
		$this->db->where('id_qe', $id_qe);
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->ev_ex_op;
		}

		return null;
	}

	private function get_ev_op_check($id_paper, $id_qe, $id_op)
	{
		$this->db->select('ev_ex_op');
		$this->db->from('evaluation_ex_op');
		$this->db->where('id_qe', $id_qe);
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_option', $id_op);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->ev_ex_op;
		}

		return null;
	}

	public function edit_txt_qe($num_paper, $qe, $text, $old, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$id_qe = $this->get_id_qe($qe, $id_project);

		$id_ev_txt = $this->get_ev_txt($id_paper, $id_qe);

		if (is_null($id_ev_txt)) {
			$data = array(
				'id_paper' => $id_paper,
				'id_qe' => $id_qe,
				'text' => $text
			);
			$this->db->insert('evaluation_ex_txt', $data);
		} else {
			if ($text == "") {
				$this->db->where('id_ev_txt', $id_ev_txt);
				$this->db->delete('evaluation_ex_txt');
			} else {
				$data = array(
					'text' => $text
				);

				$this->db->where('id_ev_txt', $id_ev_txt);
				$this->db->update('evaluation_ex_txt', $data);
			}
		}
		return $this->check_status($num_paper, $old, $id_project);
	}

	public function edit_op_qe($num_paper, $qe, $op, $old, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$id_qe = $this->get_id_qe($qe, $id_project);

		$id_op = $this->get_id_op($op, $id_qe);

		$id_ev_op = $this->get_ev_op($id_paper, $id_qe);

		if (is_null($id_ev_op)) {
			$data = array(
				'id_paper' => $id_paper,
				'id_qe' => $id_qe,
				'id_option' => $id_op
			);
			$this->db->insert('evaluation_ex_op', $data);
		} else {
			if (is_null($id_op)) {
				$this->db->where('ev_ex_op', $id_ev_op);
				$this->db->delete('evaluation_ex_op');
			} else {
				$data = array(
					'id_option' => $id_op
				);

				$this->db->where('ev_ex_op', $id_ev_op);
				$this->db->update('evaluation_ex_op', $data);
			}
		}
		return $this->check_status($num_paper, $old, $id_project);
	}

	public function edit_check_qe($num_paper, $qe, $op, $old, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$id_qe = $this->get_id_qe($qe, $id_project);

		$id_op = $this->get_id_op($op, $id_qe);

		$id_ev_op = $this->get_ev_op_check($id_paper, $id_qe, $id_op);

		if (is_null($id_ev_op)) {
			$data = array(
				'id_paper' => $id_paper,
				'id_qe' => $id_qe,
				'id_option' => $id_op
			);
			$this->db->insert('evaluation_ex_op', $data);
		} else {
			$this->db->where('ev_ex_op', $id_ev_op);
			$this->db->delete('evaluation_ex_op');

		}
		return $this->check_status($num_paper, $old, $id_project);

	}

	private function check_status($num_paper, $old, $id_project)
	{
		$qes = $this->get_qes($id_project);

		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($num_paper, $id_bibs);

		$status = 1;

		foreach ($qes as $qe) {
			if ($qe->get_type() == "Text") {
				$id_qe = $this->get_id_qe($qe->get_id(), $id_project);
				$this->db->select('*');
				$this->db->from('evaluation_ex_txt');
				$this->db->where('id_paper', $id_paper);
				$this->db->where('id_qe', $id_qe);
				$query = $this->db->get();

				if ($query->num_rows() == 0) {
					$status = 2;
				};
			} else {
				$id_qe = $this->get_id_qe($qe->get_id(), $id_project);
				$this->db->select('*');
				$this->db->from('evaluation_ex_op');
				$this->db->where('id_paper', $id_paper);
				$this->db->where('id_qe', $id_qe);
				$query = $this->db->get();

				if ($query->num_rows() == 0) {
					$status = 2;
				};
			}
		}

		$this->edit_status_ex($num_paper, $status, $id_project);

		if ($status == $old) {
			return array('change' => false, 'status' => $status);
		} else {
			return array('change' => true, 'status' => $status);
		}
	}
}
