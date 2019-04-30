<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_Model extends CI_Model
{
	public function add_research_question($id_rq, $description, $id_project)
	{

		$data = array(
			'id_project' => $id_project,
			'id' => $id_rq,
			'description' => $description
		);

		$this->db->insert('research_question', $data);
	}

	public function delete_research_question($id_rq, $id_project)
	{
		$this->db->where('id', $id_rq);
		$this->db->where('id_project', $id_project);
		$this->db->delete('research_question');
	}

	public function edit_research_question($now_id, $now_question, $old_id, $id_project)
	{
		$id_rq = null;
		$this->db->select('*');
		$this->db->from('research_question');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $old_id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_rq = $row->id_research_question;
		}

		$data = array(
			'description' => $now_question,
			'id' => $now_id
		);

		$this->db->where('id_research_question', $id_rq);
		$this->db->update('research_question', $data);
	}
}
