<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overall_Model extends CI_Model
{
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

}
