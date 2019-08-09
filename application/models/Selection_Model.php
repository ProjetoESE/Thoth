<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/Pattern_Model.php';

class Selection_Model extends Pattern_Model
{
	public function edit_status_selection($id, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$id_sel = $this->get_id_paper_sel($id_paper, $id_member);

		$data = array(
			'id_status' => $status
		);

		$this->db->where('id_paper_sel', $id_sel);
		$this->db->update('papers_selection', $data);

		$this->db->select('id_status');
		$this->db->from('papers_selection');
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();
		$paper = array();
		foreach ($query->result() as $row) {
			array_push($paper, $row->id_status);
		}

		$correct = true;
		for ($i = 0; $i < (sizeof($paper) - 1); $i++) {
			if ($paper[$i] != $paper[$i + 1]) {
				$correct = false;
			}
		}

		if ($correct) {
			$data = array(
				'status_selection' => $status
			);

			$this->db->where('id_paper', $id_paper);
			$this->db->update('papers', $data);
		} else {
			$data = array(
				'status_selection' => 3,
				'check_status_selection' => false,
			);

			$this->db->where('id_paper', $id_paper);
			$this->db->update('papers', $data);
		}

	}

	public function edit_status_selection_papers($ids, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}
		$ids_paper = array();
		$ids_sel = array();
		for ($i = 0; $i < sizeof($ids); $i++) {
			array_push($ids_paper, $this->get_id_paper($ids[$i], $id_bibs));
			$user = $this->get_id_name_user($this->session->email);
			$id_member = $this->get_id_member($user[0], $id_project);
			array_push($ids_sel, $this->get_id_paper_sel($ids_paper[$i], $id_member));
		}

		$data = array(
			'id_status' => $status
		);
		$this->db->where_in('id_paper_sel', $ids_sel);
		$this->db->update('papers_selection', $data);


		$data = array(
			'status_selection' => $status,
			'check_status_selection' => false,
		);

		$this->db->where_in('id_paper', $ids_paper);
		$this->db->update('papers', $data);


	}

	public function edit_status_paper($id, $status, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);


		$data = array(
			'status_selection' => $status,
			'check_status_selection' => true,
		);

		$this->db->where('id_paper', $id_paper);
		$this->db->update('papers', $data);


	}

	public function selected_criteria($num_paper, $id, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);

		$id_criteria = $this->get_id_criteria($id, $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$data = array(
			'id_paper' => $id_paper,
			'id_criteria' => $id_criteria,
			'id_member' => $id_member
		);

		$this->db->insert('evaluation_criteria', $data);

	}

	public function deselected_criteria($num_paper, $id, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);

		$id_criteria = $this->get_id_criteria($id, $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$id_ev = $this->get_id_evaluation_criteria($id_paper, $id_criteria, $id_member);


		$this->db->where('id_evaluation_criteria', $id_ev);
		$this->db->delete('evaluation_criteria');
	}

	private function get_id_criteria($id, $id_project)
	{
		$id_criteria = null;
		$this->db->select('id_criteria');
		$this->db->from('criteria');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_criteria = $row->id_criteria;
		}

		return $id_criteria;
	}

	private function get_id_evaluation_criteria($id_paper, $id_criteria, $id_member)
	{
		$id_ev = null;
		$this->db->select('id_evaluation_criteria');
		$this->db->from('evaluation_criteria');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_criteria', $id_criteria);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_ev = $row->id_evaluation_criteria;
		}

		return $id_ev;
	}

	public function get_evaluation_criteria($num_paper, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$ids_criteria = array();
		if (!is_null($id_paper)) {
			$ids_criteria = $this->get_ids_criteria_evaluation($id_paper, $id_member);
		}

		$inclusion = array();
		$exclusion = array();
		if (sizeof($ids_criteria) > 0) {
			$this->db->select('*');
			$this->db->from('criteria');
			$this->db->where_in('id_criteria', $ids_criteria);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				if ($row->type == "Inclusion") {
					$ic = new Inclusion_Criteria();
					$ic->set_id($row->id);
					array_push($inclusion, $ic);
				} else {
					$ec = new Exclusion_Criteria();
					$ec->set_id($row->id);
					array_push($exclusion, $ec);
				}
			}
		}

		$data['inclusion'] = $inclusion;
		$data['exclusion'] = $exclusion;

		return $data;
	}

	private function get_ids_criteria_evaluation($id_paper, $id_member)
	{
		$ids_criteria = array();
		$this->db->select('id_criteria');
		$this->db->from('evaluation_criteria');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_criteria, $row->id_criteria);
		}

		return $ids_criteria;
	}

	public function update_note_selection($num_paper, $note, $id_project)
	{

		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$paper_sel = null;
		if (!is_null($id_paper)) {
			$paper_sel = $this->get_id_paper_sel($id_paper, $id_member);
		}

		$data = array(
			'note' => $note
		);

		$this->db->where('id_paper_sel', $paper_sel);
		$this->db->update('papers_selection', $data);
	}

	public function get_paper_conflict($id_paper, $id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}
		$data = array();
		if (sizeof($id_bibs) > 0) {
			$this->db->select('papers.*, data_base.name');
			$this->db->from('papers');
			$this->db->join('data_base', 'papers.data_base = data_base.id_database');
			$this->db->where('id', $id_paper);
			$this->db->where_in('id_bib', $id_bibs);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$data['title'] = $row->title;
				$data['author'] = $row->author;
				$data['year'] = $row->year;
				$data['abstract'] = $row->abstract;
				$data['keywords'] = $row->keywords;
				$data['doi'] = $row->doi;
				$data['url'] = $row->url;
				$data['database'] = $row->name;
				$data['status'] = $row->status_selection;
				$data['notes'] = $this->get_info($row->id_paper);
			}

		}

		return $data;
	}

	private function get_info($id_paper)
	{
		$note = array();
		$this->db->select('note,id_status,papers_selection.id_member');
		$this->db->from('papers_selection');
		$this->db->join('members', 'members.id_members = papers_selection.id_member');
		$this->db->where('id_paper', $id_paper);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$this->db->select('name');
			$this->db->from('user');
			$this->db->join('members', 'members.id_user = user.id_user');
			$this->db->where('id_members', $row->id_member);
			$query2 = $this->db->get();
			$name = "";
			foreach ($query2->result() as $row2) {
				$name = $row2->name;
			}

			array_push($note, array($row->note, $name, $row->id_status, $row->id_member));
		}

		return $note;
	}

	public function get_paper_selection($id_paper, $id_project)
	{
		$ids_p_d = $this->get_ids_project_database($id_project);
		$ids_bibs = $this->get_ids_bibs($ids_p_d);

		$this->db->select('papers.*');
		$this->db->from('papers');
		$this->db->where('id', $id_paper);
		$this->db->where_in('id_bib', $ids_bibs);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$data['abstract'] = $row->abstract;
			$data['keywords'] = $row->keywords;
			$data['doi'] = $row->doi;
			$data['url'] = $row->url;
			$data['year'] = $row->year;
			$data['author'] = $row->author;
		}

		$criteria = $this->get_evaluation_criteria($id_paper, $id_project);
		$data['note'] = $this->get_note_selection($id_paper, $id_project);

		$data['inclusion'] = array();
		$data['exclusion'] = array();

		foreach ($criteria['inclusion'] as $ic) {
			array_push($data['inclusion'], $ic->get_id());
		}

		foreach ($criteria['exclusion'] as $ec) {
			array_push($data['exclusion'], $ec->get_id());
		}

		return $data;

	}

	private function get_note_selection($num_paper, $id_project)
	{
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_paper = null;
		if (sizeof($id_bibs) > 0) {
			$id_paper = $this->get_id_paper($num_paper, $id_bibs);
		}

		$paper_sel = null;
		if (!is_null($id_paper)) {
			$paper_sel = $this->get_id_paper_sel($id_paper, $id_member);
		}

		if (!is_null($paper_sel)) {
			$this->db->select('note');
			$this->db->from('papers_selection');
			$this->db->where('id_paper_sel', $paper_sel);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				return $row->note;
			}
		}
		return "";
	}

	public function get_conflicts($id_project)
	{
		$data['head'] = $this->get_researches_id_name($id_project);
		$data['papers'] = $this->get_papers_conflicts($id_project);
		return $data;
	}

	private function get_papers_conflicts($id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_papers = array();
		if (sizeof($id_bibs) > 0) {
			$id_papers = $this->get_ids_papers($id_bibs);
		}

		$data = array();
		foreach ($id_papers as $id_paper) {
			$this->db->select('id_member,id_status,id');
			$this->db->from('papers_selection');
			$this->db->join('papers', 'papers.id_paper = papers_selection.id_paper');
			$this->db->where('papers_selection.id_paper', $id_paper);
			$this->db->where('papers.check_status_selection', 0);
			$query = $this->db->get();
			$paper = array();
			foreach ($query->result() as $row) {
				$paper['id'] = $row->id;
				$paper[$row->id_member] = $row->id_status;
			}
			$data[$id_paper] = $paper;
		}

		$aux = array();
		foreach ($data as $key => $value) {
			foreach ($value as $key2 => $value2) {
				if ($key2 != 'id') {
					foreach ($value as $key3 => $value3) {
						if ($key3 != 'id') {
							if ($value2 != 3 && $value3 != 3) {
								if ($value2 != $value3) {
									$aux[$key] = $value;
								}
							}
						}
					}

				}
			}
		}


		return $aux;
	}

}
