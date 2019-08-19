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

	public function get_members_name_id($id_project)
	{
		$ids_members = array();
		$this->db->select('name,user.id_user');
		$this->db->from('members');
		$this->db->join('user', 'user.id_user = members.id_user');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_members, array($row->id_user, $row->name));
		}

		return $ids_members;
	}

	public function get_ids_members_1_3($id_project)
	{
		$ids_members = array();
		$this->db->select('id_members');
		$this->db->from('members');
		$this->db->where('id_project', $id_project);
		$this->db->where_in('level', array(1, 3));
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($ids_members, $row->id_members);
		}

		return $ids_members;
	}

	public function get_id_member($id_user, $id_project)
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

	public function get_ids_papers_qa($id_bib)
	{
		$id_papers = array();
		$this->db->select('id_paper');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$this->db->where_in('status_selection', 1);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id_paper);
		}
		return $id_papers;
	}

	public function get_ids_papers_ex($id_bib)
	{
		$id_papers = array();
		$this->db->select('id_paper');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$this->db->where_in('status_qa', 1);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id_paper);
		}
		return $id_papers;
	}

	public function get_ids_papers_chars($id_bib)
	{
		$id_papers = array();
		$this->db->select('id_paper');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$this->db->where('status_extraction', 1);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id_paper);
		}
		return $id_papers;
	}

	public function get_ID_papers($id_bib)
	{
		$id_papers = array();
		$this->db->select('id');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$this->db->where_in('status_selection', 1);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id);
		}
		return $id_papers;
	}

	public function get_evaluation_qa($id_project)
	{
		$papers = array();
		$user = $this->get_id_name_user($this->session->email);
		$id_member = $this->get_id_member($user[0], $id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$ids_paper = array();
		if (sizeof($id_bibs) > 0) {
			$ids_paper = $this->get_ID_papers($id_bibs);
		}

		$ids_qas = null;
		if (sizeof($id_bibs) > 0) {
			$ids_qas = $this->get_ids_qas($id_project);
		}

		if (sizeof($ids_paper) > 0) {

			foreach ($ids_paper as $id_paper) {
				$id = $this->get_id_paper($id_paper, $id_bibs);

				foreach ($ids_qas as $qa) {
					$score = $this->get_score_evaluation($id, $qa[0], $id_member);

					$qas [$qa[1]] = $score;
				}
				$papers[$id_paper] = $qas;
			}
		}

		return $papers;
	}

	public function get_evaluation_qa_latex($id_project)
	{
		$papers = array();
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$ids_paper = array();
		if (sizeof($id_bibs) > 0) {
			$ids_paper = $this->get_ID_papers($id_bibs);
		}

		$ids_qas = null;
		if (sizeof($id_bibs) > 0) {
			$ids_qas = $this->get_ids_qas($id_project);
		}

		if (sizeof($ids_paper) > 0) {

			foreach ($ids_paper as $id_paper) {
				$id = $this->get_id_paper($id_paper, $id_bibs);

				foreach ($ids_qas as $qa) {
					$score = $this->get_score_evaluation_latex($id, $qa[0]);

					$qas [$qa[1]] = $score;
				}
				$papers[$id_paper] = $qas;
			}
		}

		return $papers;
	}

	public function get_score_evaluation($id_paper, $id_qa, $id_member)
	{
		$this->db->select('score_rule');
		$this->db->from('evaluation_qa');
		$this->db->join('score_quality', 'score_quality.id_score = evaluation_qa.id_score_qa');
		$this->db->where('evaluation_qa.id_paper', $id_paper);
		$this->db->where('evaluation_qa.id_qa', $id_qa);
		$this->db->where('evaluation_qa.id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->score_rule;
		}

		return null;
	}

	public function get_score_evaluation_latex($id_paper, $id_qa)
	{
		$this->db->select('score_rule');
		$this->db->from('papers_qa_answer');
		$this->db->join('score_quality', 'score_quality.id_score = papers_qa_answer.id_answer');
		$this->db->where('papers_qa_answer.id_paper', $id_paper);
		$this->db->where('papers_qa_answer.id_question', $id_qa);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->score_rule;
		}

		return null;
	}

	public function get_id_score_evaluation($id_paper, $id_qa, $id_member)
	{
		$this->db->select('id_score_qa');
		$this->db->from('evaluation_qa');
		$this->db->where('evaluation_qa.id_paper', $id_paper);
		$this->db->where('evaluation_qa.id_qa', $id_qa);
		$this->db->where('evaluation_qa.id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_score_qa;
		}

		return null;
	}

	public function get_evaluation_qa_per_paper($id, $id_project)
	{
		$paper = array();
		$user = $this->get_id_researches($id_project);
		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$ids_qas = null;
		if (sizeof($id_bibs) > 0) {
			$ids_qas = $this->get_ids_qas($id_project);
		}

		$id_paper = $this->get_id_paper($id, $id_bibs);

		foreach ($user as $mem) {
			foreach ($ids_qas as $qa) {
				$score = $this->get_score_evaluation($id_paper, $qa[0], $mem);
				$qas [$qa[0]] = $score;
			}
			$paper[$mem] = $qas;
		}

		return $paper;
	}

	public function get_ID_papers_to_selection($id_bib)
	{
		$id_papers = array();
		$this->db->select('id');
		$this->db->from('papers');
		$this->db->where_in('id_bib', $id_bib);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($id_papers, $row->id);
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

	public function get_id_option($op, $id_qe)
	{
		$this->db->select('id_option');
		$this->db->from('options_extraction');
		$this->db->where('description', $op);
		$this->db->where('id_de', $id_qe);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_option;
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

	public function get_id_paper_qa($id_paper, $id_member)
	{
		$this->db->select('id_paper_qa');
		$this->db->from('papers_qa');
		$this->db->where('id_paper', $id_paper);
		$this->db->where('id_member', $id_member);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_paper_qa;
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

	public function gen_score_min($id_project)
	{
		$this->db->select('id_general_score');
		$this->db->from('general_score');
		$this->db->where('id_project', $id_project);
		$this->db->order_by('start', 'ASC');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_general_score;
		}

		return null;
	}

	public function get_qas($id_project)
	{
		$qas = array();
		$this->db->select('*');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$qa = new Question_Quality();
			$qa->set_description($row->description);
			$qa->set_id($row->id);
			$qa->set_weight($row->weight);


			$this->db->select('*');
			$this->db->from('score_quality');
			$this->db->where('id_score', $row->min_to_app);
			$query3 = $this->db->get();

			foreach ($query3->result() as $row3) {
				$sc = new Score_Quality();
				$sc->set_score($row3->score);
				$sc->set_description($row3->description);
				$sc->set_score_rule($row3->score_rule);
				$qa->set_min_to_approve($sc);
			}

			$this->db->select('*');
			$this->db->from('score_quality');
			$this->db->where('id_qa', $row->id_qa);
			$query2 = $this->db->get();

			foreach ($query2->result() as $row2) {
				$sc = new Score_Quality();
				$sc->set_score($row2->score);
				$sc->set_description($row2->description);
				$sc->set_score_rule($row2->score_rule);
				$qa->set_scores($sc);
			}

			array_push($qas, $qa);
		}
		return $qas;
	}

	public function get_researches_id_name($id_project)
	{
		$names = array();
		$this->db->select('user.name,id_members');
		$this->db->from('members');
		$this->db->join('user', 'user.id_user = members.id_user');
		$this->db->where('id_project', $id_project);
		$this->db->where_in('level', array(1, 3));
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($names, array($row->id_members, $row->name));
		}

		return $names;
	}


	public function get_id_researches($id_project)
	{
		$names = array();
		$this->db->select('id_members');
		$this->db->from('members');
		$this->db->where('id_project', $id_project);
		$this->db->where_in('level', array(1, 3));
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($names, $row->id_members);
		}

		return $names;
	}

	public function get_ids_qas($id_project)
	{
		$qas = array();
		$this->db->select('id_qa,id');
		$this->db->from('question_quality');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($qas, array($row->id_qa, $row->id));
		}
		return $qas;
	}

	public function get_ids_criteria($id_project, $id)
	{
		$this->db->select('id_criteria');
		$this->db->from('criteria');
		$this->db->where('id_project', $id_project);
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->id_criteria;
		}
		return null;
	}

	public function get_qes($id_project)
	{
		$qes = array();
		$this->db->select('id_de,id,description,types_question.type');
		$this->db->from('question_extraction');
		$this->db->join('types_question', 'types_question.id_type = question_extraction.type');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$qe = new Question_Extraction();
			$qe->set_description($row->description);
			$qe->set_id($row->id);
			$qe->set_type($row->type);

			$this->db->select('description');
			$this->db->from('options_extraction');
			$this->db->where('id_de', $row->id_de);
			$query2 = $this->db->get();

			foreach ($query2->result() as $row2) {
				$qe->set_options($row2->description);
			}

			array_push($qes, $qe);
		}
		return $qes;
	}
}
