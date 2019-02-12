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
			'created_by' => $created_by
		);

		$this->db->insert('project', $data);
		$id_project = $this->db->insert_id();

		$project = new Project();
		$project->set_title($title);
		$project->set_created_by($name);
		$project->set_id($id_project);
		$project->set_description($description);
		$project->set_objectives($objectives);

		return $project;
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

		$this->db->select('database.name');
		$this->db->from('project_databases');
		$this->db->join('database', 'database.id_database = project_databases.id_database');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_databases($row->name);
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
				$term->set_synonymus($row2->description);
			}

			$project->set_terms($term);
		}

		return $project;
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
		$this->db->from('database');
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
	}

	public function get_databases()
	{
		$databases = array();

		$this->db->select('*');
		$this->db->from('database');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($databases, $row->name);
		}

		return $databases;
	}

	public function delete_database($database, $id_project)
	{
		$id_database = null;
		$this->db->select('id_database');
		$this->db->from('database');
		$this->db->where('name', $database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_database = $row->id_database;
		}

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
			'id' =>$now_id
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
}
