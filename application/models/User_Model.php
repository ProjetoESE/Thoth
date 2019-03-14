<?php

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

		$this->db->select('project.*');
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
			array_push($projects, $project);
		}

		return $projects;
	}

	public function insert_log($activity, $module)
	{
		$id_user = $this->get_id_user($this->session->email);

		$data = array(
			'id_user' => $id_user,
			'activity' => $activity,
			'id_module' => $module
		);

		$this->db->insert('activity_log', $data);
	}
}
