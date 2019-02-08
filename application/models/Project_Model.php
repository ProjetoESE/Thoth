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

	public function add_date($start_date, $end_date, $id_project){
		$data = array(
			'start_date' => $start_date,
			'end_date' => $end_date
		);

		$this->db->where('id_project', $id_project);
		$this->db->update('project', $data);
	}
}
