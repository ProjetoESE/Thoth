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
		$this->db->join('language','language.id_language = project_languages.id_language');
		$this->db->where('id_project', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_languages($row->description);
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
		var_dump($domain);

		$this->db->where('description', $domain);
		$this->db->where('id_project', $id_project);
		$this->db->delete('domain');
	}

	public function add_language($language, $id_project)
	{
		$id_language = null;
		$this->db->select('*');
		$this->db->from('language');
		$this->db->where('description',$language);
		$query = $this->db->get();

		foreach ($query->result() as $row){
			$id_language = $row->id_language;
		}

		$data = array(
			'id_language' => $id_language,
			'id_project' => $id_project
		);

		$this->db->insert('project_languages', $data);
	}

	public function get_languages(){
		$languages = array();

		$this->db->select('*');
		$this->db->from('language');
		$query = $this->db->get();

		foreach ($query->result() as $row){
			array_push($languages,$row->description);
		}

		return $languages;
	}

	public function delete_language($language,$id_project){

		$id_language = null;
		$this->db->select('id_language');
		$this->db->from('language');
		$this->db->where('description',$language);
		$query = $this->db->get();

		foreach ($query->result() as $row){
			$id_language = $row->id_language;
		}

		$this->db->where('id_language', $id_language);
		$this->db->where('id_project', $id_project);
		$this->db->delete('project_languages');
	}
}
