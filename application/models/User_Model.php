<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model
{

	public function get_id_user($email)
	{
		$id_user = null;
		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_user = $row->id_user;
		}
		return $id_user;
	}

	public function get_name_user($id_user)
	{
		$name = null;
		$this->db->select('name');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$name = $row->name;
		}
		return $name;
	}

	public function get_projects($email)
	{

		$projects = array();
		$id_user = $this->get_id_user($email);

		$this->db->select('project.*,level');
		$this->db->from('project');
		$this->db->join('members', 'project.id_project = members.id_project');
		$this->db->where('members.id_user', $id_user);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$name = $this->get_name_user($row->created_by);
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			$project->set_description($row->description);
			$project->set_created_by($name);
			$data['project'] = $project;
			$data['level'] = $row->level;
			array_push($projects, $data);
		}


		return $projects;
	}

	public function get_projects_new($email)
	{

		$projects = array();
		$id_user = $this->get_id_user($email);

		$this->db->select('project.id_project, project.title');
		$this->db->from('project');
		$this->db->join('members', 'project.id_project = members.id_project');
		$this->db->where('members.id_user', $id_user);
		$this->db->where('project.planning', 100);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			array_push($projects, $project);
		}

		return $projects;
	}

	public function insert_log($activity, $module, $id_project)
	{
		$id_user = $this->get_id_user($this->session->email);

		$data = array(
			'id_user' => $id_user,
			'activity' => $activity,
			'id_module' => $module,
			'id_project' => $id_project
		);

		$this->db->insert('activity_log', $data);
	}

	public function search_project($string)
	{

		$projects = array();

		$this->db->select('project.*,');
		$this->db->from('project');
		$this->db->like('title', $string);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$name = $this->get_name_user($row->created_by);
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			$project->set_description($row->description);
			$project->set_created_by($name);
			$data['project'] = $project;
			$data['level'] = null;
			array_push($projects, $data);
		}

		return $projects;
	}

	public function search_project_logged($string, $email)
	{
		$projects = array();
		$id_user = $this->get_id_user($email);

		$this->db->select('project.*,level');
		$this->db->from('project');
		$this->db->join('members', 'project.id_project = members.id_project');
		$this->db->where('members.id_user', $id_user);
		$this->db->like('title', $string);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$name = $this->get_name_user($row->created_by);
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			$project->set_description($row->description);
			$project->set_created_by($name);
			$data['project'] = $project;
			$data['level'] = $row->level;
			array_push($projects, $data);
		}

		$id_projects = array();
		$this->db->select('id_project');
		$this->db->from('members');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_projects, $row->id_project);
		}

		$this->db->select('project.*,');
		$this->db->from('project');

		if (sizeof($id_projects) > 0) {
			$this->db->where_not_in('id_project', $id_projects);
		}

		$this->db->like('title', $string);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$name = $this->get_name_user($row->created_by);
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			$project->set_description($row->description);
			$project->set_created_by($name);
			$data['project'] = $project;
			$data['level'] = null;
			array_push($projects, $data);
		}


		return $projects;
	}
}
