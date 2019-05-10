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

	public function get_qas_ev($id_member, $id_project)
	{

	}

	public function get_paper_qa($num_paper, $id_project)
	{
		$ids_p_d = $this->get_ids_project_database($id_project);
		$ids_bibs = $this->get_ids_bibs($ids_p_d);

		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);

		$this->db->select('papers.*, name');
		$this->db->from('papers');
		$this->db->join('data_base', 'data_base.id_database = papers.data_base');
		$this->db->where('id', $num_paper);
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

		$data['note'] = $this->get_note_qa($num_paper, $id_member);

		return $data;

	}

	private function get_note_qa($num_paper, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$paper_qa = null;
		if (!is_null($id_paper)) {
			$paper_qa = $this->get_id_paper_qa($id_paper, $id_member);
		}

		if (!is_null($paper_qa)) {
			$this->db->select('note');
			$this->db->from('papers_qa');
			$this->db->where('id_paper_qa', $paper_qa);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				return $row->note;
			}
		}
		return "";
	}

	public function edit_status_qa($id, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$id_qa = $this->get_id_paper_qa($id_paper, $id_member);

		$data = array(
			'id_status' => $status
		);

		$this->db->where('id_paper_qa', $id_qa);
		$this->db->update('papers_qa', $data);

		$this->db->select('id_status');
		$this->db->from('papers_qa');
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();
		$paper = array();
		foreach ($query->result() as $row) {
			array_push($paper, $row->id_status);
		}

		$correct = true;
		for ($i = 0; $i < (sizeof($paper) - 1); $i++) {
			if ($paper[$i] != $paper[$i + 1]) {
				$correct = false;
			}
		}

		if ($correct) {
			$data = array(
				'status_qa' => $status,
				'check_qa' => false
			);

			$this->db->where('id_paper', $id_paper);
			$this->db->update('papers', $data);
		} else {
			$data = array(
				'status_qa' => 3,
				'check_qa' => false,
			);

			$this->db->where('id_paper', $id_paper);
			$this->db->update('papers', $data);
		}

	}

	private function edit_score_qa($id, $score, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$id_qa = $this->get_id_paper_qa($id_paper, $id_member);
		$id_gen = $this->get_gen_score_paper($score, $id_project);

		$start = $this->get_score_min_start($id_project);
		$change = false;

		if ($score >= $start) {
			$data = array(
				'score' => $score,
				'id_gen_score' => $id_gen,
				'id_status' => $status
			);

		} else {
			$data = array(
				'score' => $score,
				'id_gen_score' => $id_gen,
				'id_status' => 2
			);
			$status = 2;
		}

		if ($status != $this->get_status_qa($id_paper, $id_member)) {
			$change = true;
		}

		$gen = $this->get_gen_score($id_gen);
		$this->db->where('id_paper_qa', $id_qa);
		$this->db->update('papers_qa', $data);

		return array('gen' => $gen, 'status' => $status, 'change' => $change);

	}

	private function get_gen_score($id_gen)
	{
		$this->db->select('description');
		$this->db->from('general_score');
		$this->db->where('id_general_score', $id_gen);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->description;
		}

		return null;
	}

	private function get_status_qa($id_paper, $id_member)
	{
		$this->db->select('id_status');
		$this->db->from('papers_qa');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_status;
		}

		return null;
	}

	public function check_status_qa($id, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);

		$this->db->select('id_status,score');
		$this->db->from('papers_qa');
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();
		$status = array();
		$score = array();
		foreach ($query->result() as $row) {
			array_push($status, $row->id_status);
			array_push($score, $row->score);
		}
		$status_qa = $status[0];

		$score_total = 0.0;
		for ($i = 0; $i < sizeof($score); $i++) {
			$score_total += $score[$i];
		}
		$score_total = $score_total / sizeof($score);
		$id_gen_total = $this->get_gen_score_paper($score_total, $id_project);


		for ($i = 0; $i < (sizeof($status) - 1); $i++) {
			if ($status[$i] != $status[$i + 1]) {
				$status_qa = 3;
			}
		}

		$data = array(
			'score' => $score_total,
			'check_qa' => false,
			'id_gen_score' => $id_gen_total,
			'status_qa' => $status_qa
		);

		$this->db->where('id_paper', $id_paper);
		$this->db->update('papers', $data);

	}

	public function update_note_qa($num_paper, $note, $id_project)
	{

		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$paper_qa = null;
		if (!is_null($id_paper)) {
			$paper_qa = $this->get_id_paper_qa($id_paper, $id_member);
		}

		$data = array(
			'note' => $note
		);

		$this->db->where('id_paper_qa', $paper_qa);
		$this->db->update('papers_qa', $data);
	}

	public function selected_qa_score($num_paper, $id, $score, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);

		$id_qa = $this->get_id_qa($id, $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		if ($score != "") {
			$id_score = $this->get_id_score_qa($id_qa, $score);
			$id_ev_qa = $this->get_id_qa_score($id_paper, $id_qa, $id_member);

			if (is_null($id_ev_qa)) {
				$data = array(
					'id_paper' => $id_paper,
					'id_qa' => $id_qa,
					'id_score_qa' => $id_score,
					'id_member' => $id_member
				);
				$this->db->insert('evaluation_qa', $data);
			} else {
				$data = array(
					'id_paper' => $id_paper,
					'id_qa' => $id_qa,
					'id_score_qa' => $id_score,
					'id_member' => $id_member
				);
				$this->db->where('id_ev_qa', $id_ev_qa);
				$this->db->update('evaluation_qa', $data);
			}
		} else {
			$id_ev_qa = $this->get_id_qa_score($id_paper, $id_qa, $id_member);
			$this->db->where('id_ev_qa', $id_ev_qa);
			$this->db->delete('evaluation_qa');
		}


	}

	private function get_id_qa_score($id_paper, $id_qa, $id_member)
	{
		$this->db->select('id_ev_qa');
		$this->db->from('evaluation_qa');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_qa', $id_qa);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_ev_qa;
		}

		return null;
	}

	private function get_score_min_start($id_project)
	{
		$this->db->select('start');
		$this->db->from('general_score');
		$this->db->where('id_project', $id_project);
		$this->db->order_by('start', 'ASC');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->start;
		}

		return null;
	}

	private function get_gen_score_paper($score, $id_project)
	{
		$this->db->select('id_general_score');
		$this->db->from('general_score');
		$this->db->where('id_project', $id_project);
		$this->db->where('start <=', $score);
		$this->db->where('end >=', $score);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_general_score;
		}

		return null;
	}

	private function get_id_qa($id, $id_project)
	{
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_qa;
		}

		return null;
	}

	private function get_id_score_qa($id_qa, $score)
	{
		$this->db->select('id_score');
		$this->db->from('score_quality');
		$this->db->where('score_rule', $score);
		$this->db->where('id_qa', $id_qa);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_score;
		}

		return null;
	}

	public function calculate_score_qa_mem($num_paper, $id_project)
	{
		$ids_qa_not_null = $this->get_ids_qa_not_null($id_project);
		$ids_qa_null = $this->get_ids_qa_null($id_project);
		$weights = $this->get_weights_qas($id_project);
		$min_to_app = $this->get_min_to_app_qas($id_project);

		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);

		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$qa_ev_not_null = array();
		foreach ($ids_qa_not_null as $id_qa) {
			$this->db->select('score_quality.score');
			$this->db->from('evaluation_qa');
			$this->db->join('score_quality', 'score_quality.id_score = evaluation_qa.id_score_qa');
			$this->db->where('evaluation_qa.id_paper', $id_paper);
			$this->db->where('evaluation_qa.id_qa', $id_qa);
			$this->db->where('evaluation_qa.id_member', $id_member);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$qa_ev_not_null[$id_qa] = $row->score;
			}
		}
		$status = 1;
		if (sizeof($qa_ev_not_null) != sizeof($ids_qa_not_null)) {
			$status = 2;
		}

		$score = 0.0;
		foreach ($qa_ev_not_null as $key => $value) {
			$weight = $weights[$key];
			$score += $value * $weight / 100;
			if ($value < $min_to_app[$key]) {
				$status = 2;
			}

		}
		$qa_ev_null = array();
		foreach ($ids_qa_null as $id_qa) {
			$this->db->select('score_quality.score');
			$this->db->from('evaluation_qa');
			$this->db->join('score_quality', 'score_quality.id_score = evaluation_qa.id_score_qa');
			$this->db->where('evaluation_qa.id_paper', $id_paper);
			$this->db->where('evaluation_qa.id_qa', $id_qa);
			$this->db->where('evaluation_qa.id_member', $id_member);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$qa_ev_null[$id_qa] = $row->score;
			}
		}

		foreach ($qa_ev_null as $key => $value) {
			$weight = $weights[$key];
			$score += $value * $weight / 100;
		}

		if (sizeof($qa_ev_null) == 0 && sizeof($qa_ev_not_null) == 0) {
			$status = 3;
		}

		$result = $this->edit_score_qa($num_paper, $score, $status, $id_project);

		return array_merge(array('s' => $score), $result);
	}

	private function get_ids_qa_not_null($id_project)
	{
		$ids_qa = array();
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('min_to_app is NOT NULL', NULL, FALSE);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_qa, $row->id_qa);
		}
		return $ids_qa;
	}

	private function get_ids_qa_null($id_project)
	{
		$ids_qa = array();
		$this->db->select('id_qa');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$this->db->where('min_to_app is NULL', NULL, FALSE);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_qa, $row->id_qa);
		}
		return $ids_qa;
	}

	private function get_weights_qas($id_project)
	{
		$weights = array();
		$this->db->select('id_qa,weight');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$weights[$row->id_qa] = $row->weight;
		}

		return $weights;
	}

	private function get_min_to_app_qas($id_project)
	{
		$weights = array();
		$this->db->select('question_quality.id_qa,score');
		$this->db->from('question_quality');
		$this->db->join('score_quality', 'score_quality.id_score = question_quality.min_to_app');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$weights[$row->id_qa] = $row->score;
		}

		return $weights;
	}

	public function get_conflicts($id_project)
	{
		$data['head'] = $this->get_researches_id_name($id_project);
		$data['papers'] = $this->get_papers_conflicts($id_project);
		return $data;
	}

	private function get_papers_conflicts($id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_papers = array();
		if (sizeof($id_bibs) > 0) {
			$id_papers = $this->get_ids_papers_qa($id_bibs);
		}

		$data = array();
		foreach ($id_papers as $id_paper) {
			$this->db->select('id_member,id_status,id');
			$this->db->from('papers_qa');
			$this->db->join('papers', 'papers.id_paper = papers_qa.id_paper');
			$this->db->where('papers_qa.id_paper', $id_paper);
			$this->db->where('papers.check_qa', 0);
			$query = $this->db->get();
			$paper = array();
			foreach ($query->result() as $row) {
				$paper['id'] = $row->id;
				$paper[$row->id_member] = $row->id_status;
			}
			$data[$id_paper] = $paper;
		}

		$aux = array();
		foreach ($data as $key => $value) {
			foreach ($value as $key2 => $value2) {
				if ($key2 != 'id') {
					foreach ($value as $key3 => $value3) {
						if ($key3 != 'id') {
							if ($value2 != $value3) {
								$aux[$key] = $value;
							}
						}
					}

				}
			}
		}


		return $aux;
	}

	public function get_paper_conflict($id_paper, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}
		$data = array();
		if (sizeof($id_bibs) > 0) {
			$this->db->select('papers.*, data_base.name');
			$this->db->from('papers');
			$this->db->join('data_base', 'papers.data_base = data_base.id_database');
			$this->db->where('id', $id_paper);
			$this->db->where_in('id_bib', $id_bibs);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$data['title'] = $row->title;
				$data['author'] = $row->author;
				$data['year'] = $row->year;
				$data['abstract'] = $row->abstract;
				$data['keywords'] = $row->keywords;
				$data['doi'] = $row->doi;
				$data['url'] = $row->url;
				$data['database'] = $row->name;
				$data['status'] = $row->status_qa;
				$data['notes'] = $this->get_info($row->id_paper);
			}


		}

		return $data;
	}

	private function get_info($id_paper)
	{
		$note = array();
		$this->db->select('note,id_status,papers_qa.id_member');
		$this->db->from('papers_qa');
		$this->db->join('members', 'members.id_members = papers_qa.id_member');
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$this->db->select('name');
			$this->db->from('user');
			$this->db->join('members', 'members.id_user = user.id_user');
			$this->db->where('id_members', $row->id_member);
			$query2 = $this->db->get();
			$name = "";
			foreach ($query2->result() as $row2) {
				$name = $row2->name;
			}

			array_push($note, array($row->note, $name, $row->id_status, $row->id_member));
		}

		return $note;
	}

	public function edit_status_paper($id, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);


		$data = array(
			'status_qa' => $status,
			'check_qa' => true,
		);

		$this->db->where('id_paper', $id_paper);
		$this->db->update('papers', $data);


	}

}
