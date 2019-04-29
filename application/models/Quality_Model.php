<?php


class Quality_Model extends CI_Model
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

	public function get_project($id_project){
		$project = new Project();
		$this->db->select('title, id_project');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
		}

		$this->db->select('*');
		$this->db->from('general_score');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$score = new Quality_Score();
			$score->set_description($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			$project->set_quality_scores($score);
		}


		$this->db->select('description,end,start');
		$this->db->from('min_to_app');
		$this->db->join('general_score', 'min_to_app.id_general_score = general_score.id_general_score');
		$this->db->where('min_to_app.id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$score = new Quality_Score();
			$score->set_description($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			$project->set_score_min($score);
		}

		$this->db->select('*');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$qa = new Question_Quality();
			$qa->set_description($row->description);
			$qa->set_id($row->id);
			$qa->set_weight($row->weight);


			$this->db->select('*');
			$this->db->from('score_quality');
			$this->db->where('id_score', $row->min_to_app);
			$query3 = $this->db->get();

			foreach ($query3->result() as $row3) {
				$sc = new Score_Quality();
				$sc->set_score($row3->score);
				$sc->set_description($row3->description);
				$sc->set_score_rule($row3->score_rule);
				$qa->set_min_to_approve($sc);
			}

			$this->db->select('*');
			$this->db->from('score_quality');
			$this->db->where('id_qa', $row->id_qa);
			$query2 = $this->db->get();

			foreach ($query2->result() as $row2) {
				$sc = new Score_Quality();
				$sc->set_score($row2->score);
				$sc->set_description($row2->description);
				$sc->set_score_rule($row2->score_rule);
				$qa->set_scores($sc);
			}

			$project->set_questions_quality($qa);
		}

		return $project;
	}

}
