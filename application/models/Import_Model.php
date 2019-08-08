<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/Pattern_Model.php';

class Import_Model extends Pattern_Model
{
	public function bib_upload($papers, $database, $name, $id_project)
	{
		$count_papers = $this->count_papers_by_project($id_project);
		$id_database = $this->get_id_database($database);
		$id_project_database = $this->get_id_project_database($id_database, $id_project);

		$data3 = array(
			'name' => $name,
			'id_project_database' => $id_project_database,
		);
		$this->db->insert('bib_upload', $data3);
		$id_bib = $this->db->insert_id();

		$insert_papers = array();
		$gen_score = $this->gen_score_min($id_project);

		foreach ($papers as $p) {
			$data['id'] = $count_papers;
			$data['id_bib'] = $id_bib;

			if (!empty($p['EntryType'])) {
				$data['type'] = str_replace("\"", "", $p['EntryType']);
			} else {
				$data['type'] = "";
			}

			if (!empty($p['EntryKey'])) {
				$data['bib_key'] = str_replace("\"", "", $p['EntryKey']);
			} else {
				$data['bib_key'] = "";
			}


			if (!empty($p['Fields']['title'])) {
				$data['title'] = str_replace("\"", "", $p['Fields']['title']);
			} else {
				$data['title'] = "";
			}

			if (!empty($p['Fields']['author'])) {
				$data['author'] = str_replace("\"", "", $p['Fields']['author']);
			} else {
				$data['author'] = "";
			}

			if (!empty($p['Fields']['booktitle'])) {
				$data['book_title'] = str_replace("\"", "", $p['Fields']['booktitle']);
			} else {
				$data['book_title'] = "";
			}

			if (!empty($p['Fields']['volume'])) {
				$data['volume'] = str_replace("\"", "", $p['Fields']['volume']);
			} else {
				$data['volume'] = "";
			}

			if (!empty($p['Fields']['pages'])) {
				$data['pages'] = str_replace("\"", "", $p['Fields']['pages']);
			} else {
				$data['pages'] = "";
			}

			if (!empty($p['Fields']['numpages'])) {
				$data['num_pages'] = str_replace("\"", "", $p['Fields']['numpages']);
			} else {
				$data['num_pages'] = "";
			}

			if (!empty($p['Fields']['abstract'])) {
				$data['abstract'] = str_replace("\"", "", $p['Fields']['abstract']);
			} else {
				$data['abstract'] = "";
			}

			if (!empty($p['Fields']['keywords'])) {
				$data['keywords'] = str_replace("\"", "", $p['Fields']['keywords']);
			} else {
				$data['keywords'] = "";
			}

			if (!empty($p['Fields']['doi'])) {
				$data['doi'] = str_replace("\"", "", $p['Fields']['doi']);
			} else {
				$data['doi'] = "";
			}

			if (!empty($p['Fields']['journal'])) {
				$data['journal'] = str_replace("\"", "", $p['Fields']['journal']);
			} else {
				$data['journal'] = "";
			}

			if (!empty($p['Fields']['issn'])) {
				$data['issn'] = str_replace("\"", "", $p['Fields']['issn']);
			} else {
				$data['issn'] = "";
			}

			if (!empty($p['Fields']['location'])) {
				$data['location'] = str_replace("\"", "", $p['Fields']['location']);
			} else {
				$data['location'] = "";
			}

			if (!empty($p['Fields']['isbn'])) {
				$data['isbn'] = str_replace("\"", "", $p['Fields']['isbn']);
			} else {
				$data['isbn'] = "";
			}

			if (!empty($p['Fields']['address'])) {
				$data['address'] = str_replace("\"", "", $p['Fields']['address']);
			} else {
				$data['address'] = "";
			}

			if (!empty($p['Fields']['url'])) {
				$data['url'] = str_replace("\"", "", $p['Fields']['url']);
			} else {
				$data['url'] = "";
			}

			if (!empty($p['Fields']['series'])) {
				$data['publisher'] = str_replace("\"", "", $p['Fields']['series']);
			} else {
				$data['publisher'] = "";
			}

			if (!empty($p['Fields']['year'])) {
				$data['year'] = str_replace("\"", "", $p['Fields']['year']);
			} else {
				$data['year'] = "";
			}

			$data['score'] = 0;
			$data['status_qa'] = 3;
			$data['id_gen_score'] = $gen_score;
			$data['check_qa'] = false;
			$data['status_selection'] = 3;
			$data['status_extraction'] = 2;
			$data['note'] = "";
			$data['check_status_selection'] = false;

			$data['data_base'] = $id_database;

			array_push($insert_papers, $data);
			$count_papers++;
		}

		$this->db->insert_batch('papers', $insert_papers);

		$members = $this->get_ids_members_1_3($id_project);
		$id_papers = $this->get_ids_papers($id_bib);

		$status = array();
		$status_qa = array();
		foreach ($members as $mem) {
			foreach ($id_papers as $paper) {
				$insert = array(
					'id_paper' => $paper,
					'id_member' => $mem,
					'id_status' => 3,
					'note' => ""
				);

				$insert_qa = array(
					'id_paper' => $paper,
					'id_member' => $mem,
					'id_status' => 3,
					'note' => "",
					'score' => 0,
					'id_gen_score' => $gen_score
				);
				array_push($status, $insert);
				array_push($status_qa, $insert_qa);
			}
		}

		$this->db->insert_batch('papers_selection', $status);
		$this->db->insert_batch('papers_qa', $status_qa);

		$dat = array(
			'c_papers' => $count_papers
		);
		$this->db->where('id_project', $id_project);
		$this->db->update('project', $dat);

	}

	public function delete_bib($database, $name, $id_project)
	{
		$id_database = $this->get_id_database($database);
		$id_project_database = $this->get_id_project_database($id_database, $id_project);
		$id_bib = $this->get_id_bib($id_project_database, $name);

		$this->db->where('id_bib', $id_bib);
		$this->db->from('papers');
		$papers = $this->db->count_all_results();

		$this->db->where('id_bib', $id_bib);
		$this->db->delete('bib_upload');

		return $papers;
	}
}
