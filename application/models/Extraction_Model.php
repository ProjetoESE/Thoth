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
}
