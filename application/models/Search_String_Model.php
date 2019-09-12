<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'models/Pattern_Model.php';

class Search_String_Model extends Pattern_Model
{
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

}
