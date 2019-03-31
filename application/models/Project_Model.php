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
			'id_rule' => 1
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
			$score->setDescription($row->description);
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
			$score->setDescription($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			$project->set_score_min($score);
		}

		$this->db->select('name');
		$this->db->from('members');
		$this->db->join('user', 'user.id_user = members.id_user');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_members($row->name);
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

		return $project;
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

	public function add_domain($domain, $id_project)
	{
		$data = array(
			'description' => $domain,
			'id_project' => $id_project
		);

		$this->db->insert('domain', $data);
	}

	public function delete_domain($domain, $id_project)
	{
		$this->db->where('description', $domain);
		$this->db->where('id_project', $id_project);
		$this->db->delete('domain');
	}

	public function edit_domain($now, $old, $id_project)
	{
		$id_domain = null;
		$this->db->select('*');
		$this->db->from('domain');
		$this->db->where('id_project', $id_project);
		$this->db->where('description', $old);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_domain = $row->id_domain;
		}

		$data = array(
			'description' => $now
		);

		$this->db->where('id_domain', $id_domain);
		$this->db->update('domain', $data);
	}

	public function add_language($language, $id_project)
	{
		$id_language = null;
		$this->db->select('*');
		$this->db->from('language');
		$this->db->where('description', $language);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_language = $row->id_language;
		}

		$data = array(
			'id_language' => $id_language,
			'id_project' => $id_project
		);

		$this->db->insert('project_languages', $data);
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

	public function delete_language($language, $id_project)
	{

		$id_language = null;
		$this->db->select('id_language');
		$this->db->from('language');
		$this->db->where('description', $language);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_language = $row->id_language;
		}

		$this->db->where('id_language', $id_language);
		$this->db->where('id_project', $id_project);
		$this->db->delete('project_languages');
	}

	public function add_study_type($study_type, $id_project)
	{
		$id_study_type = null;
		$this->db->select('*');
		$this->db->from('study_type');
		$this->db->where('description', $study_type);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_study_type = $row->id_study_type;
		}

		$data = array(
			'id_study_type' => $id_study_type,
			'id_project' => $id_project
		);

		$this->db->insert('project_study_types', $data);
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

	public function delete_study_type($study_type, $id_project)
	{
		$id_study_type = null;
		$this->db->select('id_study_type');
		$this->db->from('study_type');
		$this->db->where('description', $study_type);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_study_type = $row->id_study_type;
		}

		$this->db->where('id_study_type', $id_study_type);
		$this->db->where('id_project', $id_project);
		$this->db->delete('project_study_types');
	}

	public function add_keywords($keyword, $id_project)
	{
		$data = array(
			'description' => $keyword,
			'id_project' => $id_project
		);

		$this->db->insert('keyword', $data);
	}

	public function delete_keywords($keywords, $id_project)
	{
		$this->db->where('description', $keywords);
		$this->db->where('id_project', $id_project);
		$this->db->delete('keyword');
	}

	public function edit_keywords($now, $old, $id_project)
	{
		$id_keyword = null;
		$this->db->select('*');
		$this->db->from('keyword');
		$this->db->where('id_project', $id_project);
		$this->db->where('description', $old);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_keyword = $row->id_keyword;
		}

		$data = array(
			'description' => $now
		);

		$this->db->where('id_keyword', $id_keyword);
		$this->db->update('keyword', $data);
	}

	public function add_date($start_date, $end_date, $id_project)
	{
		$data = array(
			'start_date' => $start_date,
			'end_date' => $end_date
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('project', $data);
	}

	public function add_database($database, $id_project)
	{

		$id_database = null;
		$this->db->select('id_database');
		$this->db->from('data_base');
		$this->db->where('name', $database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_database = $row->id_database;
		}


		$data = array(
			'id_project' => $id_project,
			'id_database' => $id_database
		);

		$this->db->insert('project_databases', $data);
		$id_project_database = $this->db->insert_id();

		$data = array(
			'description' => " ",
			'id_project_database' => $id_project_database
		);

		$this->db->insert('search_string', $data);

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

	public function delete_database($database, $id_project)
	{
		$id_database = null;
		$id_project_database = null;
		$this->db->select('id_database');
		$this->db->from('data_base');
		$this->db->where('name', $database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_database = $row->id_database;
		}

		$this->db->select('id_project_database');
		$this->db->from('project_databases');
		$this->db->where('id_database', $id_database);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_project_database = $row->id_project_database;
		}

		$this->db->where('id_project_database', $id_project_database);
		$this->db->delete('search_string');

		$this->db->where('id_database', $id_database);
		$this->db->where('id_project', $id_project);
		$this->db->delete('project_databases');
	}

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

	public function add_term($term, $id_project)
	{

		$data = array(
			'id_project' => $id_project,
			'description' => $term
		);

		$this->db->insert('term', $data);
	}

	public function delete_term($term, $id_project)
	{
		$id_term = null;
		$this->db->select('id_term');
		$this->db->from('term');
		$this->db->where('description', $term);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_term = $row->id_term;
		}

		$this->db->where('id_term', $id_term);
		$this->db->delete('synonym');

		$this->db->where('description', $term);
		$this->db->where('id_project', $id_project);
		$this->db->delete('term');
	}

	public function edit_term($now, $old, $id_project)
	{
		$id_term = null;
		$this->db->select('*');
		$this->db->from('term');
		$this->db->where('id_project', $id_project);
		$this->db->where('description', $old);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_term = $row->id_term;
		}

		$data = array(
			'description' => $now
		);

		$this->db->where('id_term', $id_term);
		$this->db->update('term', $data);
	}

	public function add_synonym($syn, $term, $id_project)
	{

		$id_term = null;
		$this->db->select('id_term');
		$this->db->from('term');
		$this->db->where('description', $term);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_term = $row->id_term;
		}


		$data = array(
			'id_term' => $id_term,
			'description' => $syn
		);

		$this->db->insert('synonym', $data);
	}

	public function delete_synonym($syn, $term, $id_project)
	{

		$id_term = null;
		$this->db->select('id_term');
		$this->db->from('term');
		$this->db->where('description', $term);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_term = $row->id_term;
		}

		$this->db->where('id_term', $id_term);
		$this->db->where('description', $syn);
		$this->db->delete('synonym');
	}

	public function edit_synonym($now, $old, $term, $id_project)
	{
		$id_term = null;
		$this->db->select('*');
		$this->db->from('term');
		$this->db->where('id_project', $id_project);
		$this->db->where('description', $term);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_term = $row->id_term;
		}

		$id_synonym = null;
		$this->db->select('*');
		$this->db->from('synonym');
		$this->db->where('id_term', $id_term);
		$this->db->where('description', $old);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_synonym = $row->id_synonym;
		}

		$data = array(
			'description' => $now
		);

		$this->db->where('id_synonym', $id_synonym);
		$this->db->update('synonym', $data);
	}

	public function generate_string($string, $id_project_database)
	{
		$data = array(
			'description' => $string
		);

		$this->db->where('id_project_database', $id_project_database);
		$this->db->update('search_string', $data);

	}

	public function get_id_project_database($database, $id_project)
	{
		$id_database = null;

		$this->db->select('id_database');
		$this->db->from('data_base');
		$this->db->where('name', $database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_database = $row->id_database;
		}

		$this->db->select('id_project_database');
		$this->db->from('project_databases');
		$this->db->where('id_project', $id_project);
		$this->db->where('id_database', $id_database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$r = $row->id_project_database;
			return $r;

		}
	}

	public function generate_string_generic($string, $id_project)
	{
		$data = array(
			'description' => $string
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('search_string_generics', $data);

	}

	public function edit_search_strategy($search_strategy, $id_project)
	{
		$data = array(
			'description' => $search_strategy
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('search_strategy', $data);
	}

	public function get_terms_and_syn($id_project)
	{
		$data = array();

		$this->db->select('*');
		$this->db->from('term');
		$this->db->where('id_project', $id_project);
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

			array_push($data, $term);
		}

		return $data;
	}

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

	public function get_users()
	{
		$users = array();
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('members', 'members.id_user = user.id_user', 'left');
		$this->db->where('members.id_user', null);
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

	public function new_database($database, $link, $id_project)
	{
		$data = array(
			'name' => $database,
			'link' => $link
		);

		$this->db->insert('data_base', $data);

		$this->add_database($database, $id_project);

	}

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

	public function get_logs($id_project)
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
}
