<?php


class Extraction_Model extends CI_Model
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
}
