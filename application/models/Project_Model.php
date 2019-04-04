<?php

class Project_Model extends CI_Model
{

	public function created_project($title, $description, $objectives, $email)
	{
		$created_by = null;
		$name = null;

		$this->db->select('id_user,name');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$created_by = $row->id_user;
			$name = $row->name;
		}

		$data = array(
			'title' => $title,
			'description' => $description,
			'created_by' => $created_by,
			'objectives' => $objectives
		);

		$this->db->insert('project', $data);
		$id_project = $this->db->insert_id();

		$data = array(
			'id_project' => $id_project,
			'description' => " ",
		);

		$this->db->insert('search_string_generics', $data);
		$this->db->insert('search_strategy', $data);

		$data = array(
			'id_project' => $id_project,
			'id_rule' => 2
		);

		$this->db->insert('inclusion_rule', $data);
		$this->db->insert('exclusion_rule', $data);

		$data = array(
			'id_project' => $id_project,
			'id_user' => $created_by,
			'level' => 1
		);

		$this->db->insert('members', $data);

		$project = new Project();
		$project->set_title($title);
		$project->set_created_by($name);
		$project->set_id($id_project);
		$project->set_description($description);
		$project->set_objectives($objectives);
		$project->set_members($name);

		return $id_project;
	}

	public function get_project($id)
	{

		$project = new Project();
		$this->db->select('project.*, user.name');
		$this->db->from('project');
		$this->db->join('user', 'project.created_by = user.id_user');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_created_by($row->name);
			$project->set_id($row->id_project);
			$project->set_description($row->description);
			$project->set_objectives($row->objectives);
			$project->set_start_date($row->start_date);
			$project->set_end_date($row->end_date);
		}

		$this->db->select('*');
		$this->db->from('domain');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_domains($row->description);
		}

		$this->db->select('language.description');
		$this->db->from('project_languages');
		$this->db->join('language', 'language.id_language = project_languages.id_language');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_languages($row->description);
		}

		$this->db->select('study_type.description');
		$this->db->from('project_study_types');
		$this->db->join('study_type', 'study_type.id_study_type = project_study_types.id_study_type');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_study_types($row->description);
		}

		$this->db->select('*');
		$this->db->from('keyword');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_keywords($row->description);
		}

		$this->db->select('data_base.*');
		$this->db->from('project_databases');
		$this->db->join('data_base', 'data_base.id_database = project_databases.id_database');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$database = new Database();
			$database->set_name($row->name);
			$database->set_link($row->link);
			$project->set_databases($database);
		}

		$this->db->select('*');
		$this->db->from('research_question');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$rq = new Research_Question();
			$rq->set_id($row->id);
			$rq->set_description($row->description);
			$project->set_research_questions($rq);
		}

		$this->db->select('*');
		$this->db->from('search_strategy');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_search_strategy($row->description);
		}

		$this->db->select('*');
		$this->db->from('search_string_generics');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$ss = new Search_String();
			$ss->set_description($row->description);
			$ss->set_database('Generic');
			$project->set_search_strings($ss);
		}

		$this->db->select('search_string.description, data_base.name');
		$this->db->from('search_string');
		$this->db->join('project_databases', 'project_databases.id_project_database = search_string.id_project_database');
		$this->db->join('data_base', 'data_base.id_database = project_databases.id_database');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$ss = new Search_String();
			$ss->set_description($row->description);
			$ss->set_database($row->name);
			$project->set_search_strings($ss);
		}

		$this->db->select('*');
		$this->db->from('term');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$term = new Term();
			$term->set_description($row->description);

			$this->db->select('*');
			$this->db->from('synonym');
			$this->db->where('id_term', $row->id_term);
			$query2 = $this->db->get();

			foreach ($query2->result() as $row2) {
				$term->set_synonyms($row2->description);
			}

			$project->set_terms($term);
		}

		$this->db->select('*');
		$this->db->from('inclusion_rule');
		$this->db->join('rule', 'rule.id_rule = inclusion_rule.id_rule');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_inclusion_rule($row->description);
		}

		$this->db->select('*');
		$this->db->from('exclusion_rule');
		$this->db->join('rule', 'rule.id_rule = exclusion_rule.id_rule');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_exclusion_rule($row->description);
		}

		$this->db->select('*');
		$this->db->from('criteria');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			if ($row->type == "Inclusion") {
				$ic = new Inclusion_Criteria();
				$ic->set_description($row->description);
				$ic->set_id($row->id);
				if ($row->pre_selected == 0) {
					$ic->set_pre_selected(false);
				} else {
					$ic->set_pre_selected(true);
				}
				$project->set_inclusion_criteria($ic);
			} else {
				$ec = new Exclusion_Criteria();
				$ec->set_description($row->description);
				$ec->set_id($row->id);
				if ($row->pre_selected == 0) {
					$ec->set_pre_selected(false);
				} else {
					$ec->set_pre_selected(true);
				}
				$project->set_exclusion_criteria($ec);
			}
		}

		$this->db->select('*');
		$this->db->from('general_score');
		$this->db->where('id_project', $id);
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
		$this->db->where('min_to_app.id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$score = new Quality_Score();
			$score->set_description($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			$project->set_score_min($score);
		}

		$this->db->select('name,email');
		$this->db->from('members');
		$this->db->join('user', 'user.id_user = members.id_user');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$user = new User();
			$user->set_email($row->email);
			$user->set_name($row->name);
			$project->set_members($user);
		}

		$this->db->select('*');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id);
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

		$this->db->select('id_de,id,description,types_question.type');
		$this->db->from('question_extraction');
		$this->db->join('types_question', 'types_question.id_type = question_extraction.type');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$qe = new Question_Extraction();
			$qe->set_description($row->description);
			$qe->set_id($row->id);
			$qe->set_type($row->type);

			$this->db->select('description');
			$this->db->from('options_extraction');
			$this->db->where('id_de', $row->id_de);
			$query2 = $this->db->get();

			foreach ($query2->result() as $row2) {
				$qe->set_options($row2->description);
			}

			$project->set_questions_extraction($qe);
		}

		return $project;
	}

	public function get_databases()
	{
		$databases = array();

		$this->db->select('*');
		$this->db->from('data_base');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$database = new Database();
			$database->set_name($row->name);
			$database->set_link($row->link);
			array_push($databases, $database);
		}

		return $databases;
	}

	public function get_rules()
	{
		$data = array();

		$this->db->select('*');
		$this->db->from('rule');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($data, $row->description);
		}

		return $data;
	}

	public function get_languages()
	{
		$languages = array();

		$this->db->select('*');
		$this->db->from('language');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($languages, $row->description);
		}

		return $languages;
	}

	public function get_study_types()
	{
		$study_types = array();

		$this->db->select('*');
		$this->db->from('study_type');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($study_types, $row->description);
		}

		return $study_types;
	}

	public function get_users($id)
	{
		$users = array();
		$id_users = array();
		$this->db->select('id_user');
		$this->db->from('members');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_users, $row->id_user);
		}

		$this->db->select('user.*');
		$this->db->from('user');
		$this->db->where_not_in('id_user', $id_users);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$user = new User();
			$user->set_name($row->name);
			$user->set_email($row->email);
			array_push($users, $user);
		}
		return $users;
	}

	public function add_member($email, $level, $id_project)
	{

		$id_level = null;
		$this->db->select('id_level');
		$this->db->from('levels');
		$this->db->where('level', $level);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_level = $row->id_level;
		}


		$id_user = null;
		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_user = $row->id_user;
		}

		$data = array(
			'id_user' => $id_user,
			'id_project' => $id_project,
			'level' => $id_level
		);

		$this->db->insert('members', $data);
	}

	public function get_levels()
	{
		$levels = array();
		$this->db->select('*');
		$this->db->from('levels');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($levels, $row->level);
		}
		return $levels;
	}

	public function edit_project($title, $description, $objectives, $id_project)
	{
		$data = array(
			'title' => $title,
			'description' => $description,
			'objectives' => $objectives
		);
		$this->db->where('id_project', $id_project);
		$this->db->update('project', $data);
	}

	public function get_logs_project($id_project)
	{
		$data = array();
		$this->db->select('name,activity,time');
		$this->db->from('activity_log');
		$this->db->join('user', 'user.id_user = activity_log.id_user');
		$this->db->where('activity_log.id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$data2 = array(
				'name' => $row->name,
				'activity' => $row->activity,
				'time' => $row->time
			);
			array_push($data, $data2);
		}

		return array_reverse($data);
	}

	public function get_types()
	{
		$data = array();

		$this->db->select('*');
		$this->db->from('types_question');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($data, $row->type);
		}

		return $data;
	}

	public function deleted_project($id_project)
	{
		$this->db->where('id_project', $id_project);
		$this->db->delete('project');

	}

	public function get_level($email, $id_project)
	{
		$level = null;
		$this->db->select('level');
		$this->db->from('user');
		$this->db->join('members', 'members.id_user = user.id_user');
		$this->db->where('user.email', $email);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$level = $row->level;
		}
		return $level;
	}

}
