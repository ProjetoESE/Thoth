<?php

class User_Model extends CI_Model
{


	public function get_projects($email)
	{
		$projects = array();
		$id_user = null;

		$this->db->select('id_user');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_user = $row->id_user;
		}

		$this->db->select('project.*, user.name as name');
		$this->db->from('project');
		$this->db->join('user', 'project.created_by = user.id_user');
		$this->db->where(array('created_by' => $id_user));
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project = new Project();
			$project->set_id($row->id_project);
			$project->set_title($row->title);
			$project->set_description($row->description);
			$project->set_created_by($row->name);
			array_push($projects, $project);
		}

		return $projects;
	}

}
