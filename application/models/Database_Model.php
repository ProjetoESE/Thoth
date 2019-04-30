<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_Model extends CI_Model
{
	public function new_database($database, $link, $id_project)
	{
		$data = array(
			'name' => $database,
			'link' => $link
		);

		$this->db->insert('data_base', $data);

		$this->add_database($database, $id_project);

	}

	public function add_database($database, $id_project)
	{

		$id_database = null;
		$link = "";
		$this->db->select('*');
		$this->db->from('data_base');
		$this->db->where('name', $database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_database = $row->id_database;
			$link = $row->link;
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

		return $link;
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

}
