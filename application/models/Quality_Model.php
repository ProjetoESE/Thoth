<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quality_Model extends Pattern_Model
{
	public function add_qa($id, $qa, $weight, $id_project)
	{

		$data = array(
			'id' => $id,
			'description' => $qa,
			'weight' => $weight,
			'id_project' => $id_project,
		);

		$this->db->insert('question_quality', $data);
	}

	public function delete_qa($id, $id_project)
	{

		$this->db->where('id', $id);
		$this->db->where('id_project', $id_project);
		$this->db->delete('question_quality');
	}

	public function add_score_quality($score_rule, $score, $description, $id_project, $id_qa)
	{

		$id = null;
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id_qa);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id = $row->id_qa;
		}

		$data = array(
			'score_rule' => $score_rule,
			'score' => $score,
			'description' => $description,
			'id_qa' => $id
		);

		$this->db->insert('score_quality', $data);
	}

	public function edit_min_score_qa($score, $id, $id_project)
	{
		$id_qa = null;
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_qa = $row->id_qa;
		}

		$id_min = null;
		$this->db->select('id_score');
		$this->db->from('score_quality');
		$this->db->where('id_qa', $id_qa);
		$this->db->where('score_rule', $score);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_min = $row->id_score;
		}

		$data = array(
			'min_to_app' => $id_min
		);

		$this->db->where('id_qa', $id_qa);
		$this->db->update('question_quality', $data);
	}

	public function delete_score_quality($score, $id, $id_project)
	{

		$id_qa = null;
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_qa = $row->id_qa;
		}

		$this->db->where('id_qa', $id_qa);
		$this->db->where('score_rule', $score);
		$this->db->delete('score_quality');
	}

	public function edit_qa($id, $qa, $weight, $old_id, $id_project)
	{
		$id_qa = null;
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $old_id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_qa = $row->id_qa;
		}

		$data = array(
			'id' => $id,
			'description' => $qa,
			'weight' => $weight
		);

		$this->db->where('id_qa', $id_qa);
		$this->db->update('question_quality', $data);
	}

	public function edit_score_quality($score_rule, $old_score_rule, $score, $description, $id_project, $id_qa)
	{
		$id_qas = null;
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id_qa);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_qas = $row->id_qa;
		}

		$id_score = null;
		$this->db->select('id_score');
		$this->db->from('score_quality');
		$this->db->where('id_qa', $id_qas);
		$this->db->where('score_rule', $old_score_rule);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_score = $row->id_score;
		}

		$data = array(
			'score' => $score,
			'description' => $description,
			'score_rule' => $score_rule
		);

		$this->db->where('id_score', $id_score);
		$this->db->update('score_quality', $data);
	}

	public function add_general_quality_score($start_interval, $end_interval, $general_score_desc, $id_project)
	{
		var_dump($general_score_desc);
		$data = array(
			'start' => $start_interval,
			'id_project' => $id_project,
			'end' => $end_interval,
			'description' => $general_score_desc
		);

		$this->db->insert('general_score', $data);
	}

	public function delete_general_quality_score($description, $id_project)
	{

		$id_general_score = null;

		$this->db->select('id_general_score');
		$this->db->from('general_score');
		$this->db->where('description', $description);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_general_score = $row->id_general_score;
		}

		$this->db->where('id_general_score', $id_general_score);
		$this->db->delete('min_to_app');

		$this->db->where('description', $description);
		$this->db->where('id_project', $id_project);
		$this->db->delete('general_score');
	}

	public function edit_general_score($description, $start, $end, $old_desc, $id_project)
	{
		$data = array(
			'start' => $start,
			'end' => $end,
			'description' => $description
		);
		$this->db->where('description', $old_desc);
		$this->db->where('id_project', $id_project);
		$this->db->update('general_score', $data);
	}

	public function edit_min_score($score, $id_project)
	{
		$id_general_score = null;

		$this->db->select('id_general_score');
		$this->db->from('general_score');
		$this->db->where('description', $score);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_general_score = $row->id_general_score;
		}

		$data = array(
			'id_general_score' => $id_general_score
		);

		$this->db->where('id_project', $id_project);
		$q = $this->db->get('min_to_app');

		if ($q->num_rows() > 0) {
			$this->db->where('id_project', $id_project);
			$this->db->update('min_to_app', $data);
		} else {
			$data['id_project'] = $id_project;
			$this->db->insert('min_to_app', $data);
		}

	}

	public function get_paper_qa($id_paper, $id_project)
	{
		$ids_p_d = $this->get_ids_project_database($id_project);
		$ids_bibs = $this->get_ids_bibs($ids_p_d);

		$this->db->select('papers.*, name');
		$this->db->from('papers');
		$this->db->join('data_base','data_base.id_database = papers.data_base');
		$this->db->where('id', $id_paper);
		$this->db->where_in('id_bib', $ids_bibs);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$data['abstract'] = $row->abstract;
			$data['keywords'] = $row->keywords;
			$data['doi'] = $row->doi;
			$data['url'] = $row->url;
			$data['author'] = $row->author;
			$data['year'] = $row->year;
			$data['database'] = $row->name;
		}

		return $data;

	}

}
