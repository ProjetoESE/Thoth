<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pattern_Model extends CI_Model
{
	public function get_id_bib($id_project_database, $name)
	{
		$id_bib = null;
		$this->db->select('id_bib');
		$this->db->from('bib_upload');
		$this->db->where('id_project_database', $id_project_database);
		$this->db->where('name', $name);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_bib = $row->id_bib;
		}

		return $id_bib;
	}

	public function count_papers_by_project($id_project)
	{
		$this->db->select('c_papers');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			return $row->c_papers;
		}

		return null;

	}

	public function get_id_database($name)
	{
		$this->db->select('*');
		$this->db->from('data_base');
		$this->db->where('name', $name);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_database;
		}
		return null;
	}

	public function get_id_project_database($id_database, $id_project)
	{

		$this->db->select('id_project_database');
		$this->db->from('project_databases');
		$this->db->where('id_project', $id_project);
		$this->db->where('id_database', $id_database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_project_database;
		}

		return null;
	}

	public function get_ids_members($id_project)
	{
		$ids_members = array();
		$this->db->select('id_members');
		$this->db->from('members');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_members, $row->id_members);
		}

		return $ids_members;
	}

	public function get_id_member($id_user,$id_project)
	{
		$this->db->select('id_members');
		$this->db->from('members');
		$this->db->where('id_project', $id_project);
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_members;
		}

		return null;
	}

	public function get_ids_users($id_project)
	{
		$ids_users = array();
		$this->db->select('id_user');
		$this->db->from('members');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_users, $row->id_user);
		}

		return $ids_users;
	}

	public function get_ids_papers($id_bib)
	{
		$id_papers = array();
		$this->db->select('id_paper');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id_paper);
		}
		return $id_papers;
	}

	public function get_ids_project_database($id_project)
	{
		$ids_project_database = array();
		$this->db->select('id_project_database');
		$this->db->from('project_databases');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_project_database, $row->id_project_database);
		}

		return $ids_project_database;
	}

	public function get_ids_bibs($ids_project_database)
	{
		$ids_bib = array();
		$this->db->select('id_bib');
		$this->db->from('bib_upload');
		$this->db->where_in('id_project_database', $ids_project_database);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_bib, $row->id_bib);
		}
		return $ids_bib;
	}

	public function get_id_paper($id_paper, $id_bibs)
	{
		$this->db->select('id_paper');
		$this->db->from('papers');
		$this->db->where('id', $id_paper);
		$this->db->where_in('id_bib', $id_bibs);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_paper;
		}
		return null;
	}

	public function get_id_name_user($email)
	{
		$id_user = null;
		$name = null;

		$this->db->select('id_user,name');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_user = $row->id_user;
			$name = $row->name;
		}
		return array($id_user, $name);
	}

	public function get_id_paper_sel($id_paper, $id_member)
	{
		$this->db->select('id_paper_sel');
		$this->db->from('papers_selection');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_paper_sel;
		}
		return null;

	}

	public function get_criteria($id_project, $type)
	{
		$criterias = array();
		$this->db->select('*');
		$this->db->from('criteria');
		$this->db->where('id_project', $id_project);
		$this->db->where('type', $type);
		$query = $this->db->get();

		if ($type == "Inclusion") {
			foreach ($query->result() as $row) {

				$ic = new Inclusion_Criteria();
				$ic->set_description($row->description);
				$ic->set_id($row->id);
				if ($row->pre_selected == 0) {
					$ic->set_pre_selected(false);
				} else {
					$ic->set_pre_selected(true);
				}
				array_push($criterias, $ic);
			}
		} else {
			foreach ($query->result() as $row) {

				$ec = new Exclusion_Criteria();
				$ec->set_description($row->description);
				$ec->set_id($row->id);
				if ($row->pre_selected == 0) {
					$ec->set_pre_selected(false);
				} else {
					$ec->set_pre_selected(true);
				}
				array_push($criterias, $ec);
			}
		}

		return $criterias;

	}

	public function get_inclusion_rule($id_project)
	{

		$this->db->select('*');
		$this->db->from('inclusion_rule');
		$this->db->join('rule', 'rule.id_rule = inclusion_rule.id_rule');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->description;
		}
		return null;
	}

	public function get_exclusion_rule($id_project)
	{
		$this->db->select('*');
		$this->db->from('exclusion_rule');
		$this->db->join('rule', 'rule.id_rule = exclusion_rule.id_rule');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->description;
		}
		return null;
	}

}
