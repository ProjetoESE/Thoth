<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models\Pattern_Model.php';

class Project_Model extends Pattern_Model
{

	public function created_project($title, $description, $objectives, $email)
	{
		$user = $this->get_id_name_user($email);

		$created_by = $user[0];
		$name = $user[1];

		$data = array(
			'title' => $title,
			'description' => $description,
			'created_by' => $created_by,
			'objectives' => $objectives
		);

		$this->db->insert('project', $data);
		$id_project = $this->db->insert_id();

		$data = array(
			'id_project' => $id_project,
			'description' => " ",
		);

		$this->db->insert('search_string_generics', $data);
		$this->db->insert('search_strategy', $data);

		$data = array(
			'id_project' => $id_project,
			'id_rule' => 2
		);

		$this->db->insert('inclusion_rule', $data);
		$this->db->insert('exclusion_rule', $data);

		$data = array(
			'id_project' => $id_project,
			'id_user' => $created_by,
			'level' => 1
		);

		$this->db->insert('members', $data);

		$project = new Project();
		$project->set_title($title);
		$project->set_created_by($name);
		$project->set_id($id_project);
		$project->set_description($description);
		$project->set_objectives($objectives);
		$project->set_members($name);

		return $id_project;
	}

	private function exist_row($table, $id_project, $where = array(), $join = array())
	{
		$this->db->select('*');
		$this->db->from($table);
		if (sizeof($join) > 0) {
			foreach ($join as $key => $value)
				$this->db->join($key, $value);
		}
		if (sizeof($where) > 0) {
			foreach ($where as $key => $value)
				$this->db->where($key, $value);
		} else {
			$this->db->where('id_project', $id_project);
		}
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function get_project_databases($id_project)
	{
		$p_data = array();
		$this->db->select('name');
		$this->db->from('project_databases');
		$this->db->join('data_base', 'data_base.id_database = project_databases.id_database');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($p_data, $row->name);
		}

		return $p_data;
	}

	private function update_progress_planning($id_project)
	{
		$errors = array();
		$progress = 11;

		if ($this->exist_row('domain', $id_project)) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Domains");
		}

		if ($this->exist_row('project_languages', $id_project)) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Languages");
		}


		if ($this->exist_row('project_study_types', $id_project)) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Study Types");
		}

		if ($this->exist_row('keyword', $id_project)) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Keywords");
		}


		if ($this->exist_row('research_question', $id_project)) {
			$progress += 11;
		} else {
			array_push($errors, "Add Research Questions");
		}

		if ($this->exist_row('project_databases', $id_project)) {
			$progress += 11;
		} else {
			array_push($errors, "Add Databases");
		}

		if ($this->exist_row('term', $id_project)) {
			$progress += 5.5;
		} else {
			array_push($errors, "Add Terms");
		}

		if ($this->exist_row('search_string', $id_project, array('project_databases.id_project' => $id_project), array('project_databases' => 'project_databases.id_project_database = search_string.id_project_database'))) {
			$progress += 5.5;
		} else {
			array_push($errors, "Add Search Strings");
		}


		if ($this->exist_row('search_strategy', $id_project)) {
			$progress += 11;
		}

		if ($this->exist_row('inclusion_rule', $id_project)) {
			$progress += 2.75;
		}

		if ($this->exist_row('exclusion_rule', $id_project)) {
			$progress += 2.75;
		}

		if ($this->exist_row('criteria', $id_project, array('type' => 'Inclusion'))) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Inclusion Criteria");
		}

		if ($this->exist_row('criteria', $id_project, array('type' => 'Inclusion'))) {
			$progress += 2.75;
		} else {
			array_push($errors, "Add Exclusion Criteria");
		}

		if ($this->exist_row('min_to_app', $id_project)) {
			$progress += 3.6;
		}

		if ($this->exist_row('general_score', $id_project)) {
			$progress += 3.6;
		} else {
			array_push($errors, "Add Quality Scores");
		}

		if ($this->exist_row('question_quality', $id_project)) {
			$progress += 3.8;
		} else {
			array_push($errors, "Add Question Quality");
		}


		if ($this->exist_row('question_extraction', $id_project)) {
			$progress += 12;
		} else {
			array_push($errors, "Add Question Extraction");
		}

		$this->db->where('id_project', $id_project);
		$this->db->update('project', array('planning' => number_format((float)$progress, 2)));

		return $errors;
	}

	private function update_progress_import($id_project)
	{
		$errors = array();
		$progress = 0;
		$peso = 0;

		$p_data = $this->get_project_databases($id_project);

		if (sizeof($p_data) > 0) {
			$peso = 100 / sizeof($p_data);
		}
		foreach ($p_data as $database) {
			if ($this->get_num_bib($database, $id_project) > 0) {
				$progress += $peso;
			} else {
				array_push($errors, "Add papers at " . $database);
			}
		}
		$this->db->where('id_project', $id_project);
		$this->db->update('project', array('import' => number_format((float)$progress, 2)));


		return $errors;
	}

	public function count_papers_by_status_sel($id_project)
	{
		$ids_p_d = $this->get_ids_project_database($id_project);
		$id_bibs = array();
		$total = 0;
		$cont[1] = 0;
		$cont[2] = 0;
		$cont[3] = 0;
		$cont[4] = 0;
		$cont[5] = 0;
		$cont[6] = 0;

		if (sizeof($ids_p_d) > 0) {
			$id_bibs = $this->get_ids_bibs($ids_p_d);
		}

		if (sizeof($id_bibs) > 0) {

			$this->db->select('status_selection, COUNT(*) as count');
			$this->db->from('papers');
			$this->db->group_by('status_selection');
			$this->db->where_in('id_bib', $id_bibs);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$cont[$row->status_selection] = $row->count;
				$total += $row->count;
			}
		}
		$cont[6] = $total;

		return $cont;
	}

	private function update_progress_selection($id_project)
	{
		$errors = array();
		$progress = 0;

		$count_papers = $this->count_papers_by_status_sel($id_project);

		if ($count_papers[6] > 0) {
			$unc = ($count_papers[3] * 100) / $count_papers[6];
			$progress = 100 - $unc;
		}
		if ($progress == 0) {
			array_push($errors, "Evaluate at least one job to move on to the next step");
		}

		$this->db->where('id_project', $id_project);
		$this->db->update('project', array('selection' => number_format((float)$progress, 2)));

		return $errors;
	}

	public function get_project_overview($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));
		$errors = array_merge($errors, $this->update_progress_selection($id_project));
		$errors = array_merge($errors, $this->update_progress_quality($id_project));
		$errors = array_merge($errors, $this->update_progress_extraction($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_description($row->description);
			$project->set_objectives($row->objectives);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
			$project->set_selection($row->selection);
			$project->set_quality($row->quality);
			$project->set_extraction($row->extraction);
		}

		$project->set_members($this->get_members($id_project));
		$project->set_errors($errors);

		return $project;
	}

	public function get_project_edit($id_project)
	{
		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_description($row->description);
			$project->set_objectives($row->objectives);
		}

		return $project;
	}

	public function get_project_members($id_project)
	{

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
		}

		$project->set_members($this->get_members($id_project));

		return $project;
	}

	private function get_members($id_project)
	{
		$members = array();
		$this->db->select('name,email,levels.level');
		$this->db->from('members');
		$this->db->join('user', 'user.id_user = members.id_user');
		$this->db->join('levels', 'levels.id_level = members.level');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$user = new User();
			$user->set_email($row->email);
			$user->set_level($row->level);
			$user->set_name($row->name);
			array_push($members, $user);
		}

		return $members;
	}

	private function update_progress_quality($id_project)
	{
		$errors = array();
		$progress = 0;
		$this->db->where('id_project', $id_project);
		$this->db->update('project', array('quality' => number_format((float)$progress, 2)));
		return $errors;
	}

	private function update_progress_extraction($id_project)
	{
		$errors = array();
		$progress = 0;
		$this->db->where('id_project', $id_project);
		$this->db->update('project', array('extraction' => number_format((float)$progress, 2)));
		return $errors;
	}

	public function get_project_planning($id_project)
	{
		$errors = array();

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
		}

		$project->set_errors($errors);
		$project->set_domains($this->get_domains($id_project));
		$project->set_languages($this->get_languages($id_project));
		$project->set_study_types($this->get_study_types($id_project));
		$project->set_keywords($this->get_keywords($id_project));
		$project->set_databases($this->get_databases($id_project));
		$project->set_research_questions($this->get_rqs($id_project));
		$project->set_search_strategy($this->get_search_strategy($id_project));
		$project->set_search_strings($this->get_search_strings($id_project));
		$project->set_terms($this->get_terms($id_project));
		$project->set_inclusion_rule($this->get_inclusion_rule($id_project));
		$project->set_exclusion_rule($this->get_exclusion_rule($id_project));
		$project->set_inclusion_criteria($this->get_criteria($id_project, "Inclusion"));
		$project->set_exclusion_criteria($this->get_criteria($id_project, "Exclusion"));
		$project->set_quality_scores($this->get_general_scores($id_project));
		$project->set_score_min($this->get_min_to_app($id_project));
		$project->set_questions_quality($this->get_qas($id_project));
		$project->set_questions_extraction($this->get_qes($id_project));

		return $project;
	}

	private function get_domains($id_project)
	{
		$domains = array();
		$this->db->select('*');
		$this->db->from('domain');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($domains, $row->description);
		}
		return $domains;
	}

	private function get_languages($id_project)
	{
		$languages = array();
		$this->db->select('language.description');
		$this->db->from('project_languages');
		$this->db->join('language', 'language.id_language = project_languages.id_language');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($languages, $row->description);
		}
		return $languages;
	}

	private function get_study_types($id_project)
	{
		$types = array();
		$this->db->select('study_type.description');
		$this->db->from('project_study_types');
		$this->db->join('study_type', 'study_type.id_study_type = project_study_types.id_study_type');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($types, $row->description);
		}
		return $types;
	}

	private function get_keywords($id_project)
	{
		$keywords = array();
		$this->db->select('*');
		$this->db->from('keyword');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($keywords, $row->description);
		}
		return $keywords;
	}

	private function get_databases($id_project)
	{
		$databases = array();
		$this->db->select('data_base.*,project_databases.id_project_database');
		$this->db->from('project_databases');
		$this->db->join('data_base', 'data_base.id_database = project_databases.id_database');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$database = new Database();
			$database->set_name($row->name);
			$database->set_link($row->link);
			array_push($databases, $database);
		}
		return $databases;
	}

	private function get_rqs($id_project)
	{
		$rqs = array();
		$this->db->select('*');
		$this->db->from('research_question');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$rq = new Research_Question();
			$rq->set_id($row->id);
			$rq->set_description($row->description);
			array_push($rqs, $rq);
		}
		return $rqs;
	}

	private function get_search_strategy($id_project)
	{
		$this->db->select('*');
		$this->db->from('search_strategy');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->description;
		}
		return "";
	}

	private function get_search_strings($id_project)
	{
		$sss = array();
		$this->db->select('*');
		$this->db->from('search_string_generics');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$ss = new Search_String();
			$ss->set_description($row->description);
			$db = new Database();
			$db->set_name("Generic");
			$db->set_link("#");
			$ss->set_database($db);
			array_push($sss, $ss);
		}

		$this->db->select('search_string.description, data_base.name,data_base.link');
		$this->db->from('search_string');
		$this->db->join('project_databases', 'project_databases.id_project_database = search_string.id_project_database');
		$this->db->join('data_base', 'data_base.id_database = project_databases.id_database');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$ss = new Search_String();
			$ss->set_description($row->description);
			$db = new Database();
			$db->set_name($row->name);
			$db->set_link($row->link);
			$ss->set_database($db);
			array_push($sss, $ss);
		}

		return $sss;
	}

	private function get_terms($id_project)
	{
		$terms = array();
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

			array_push($terms, $term);
		}
		return $terms;
	}

	private function get_general_scores($id_project)
	{
		$scores = array();
		$this->db->select('*');
		$this->db->from('general_score');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$score = new Quality_Score();
			$score->set_description($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			array_push($scores, $score);
		}
		return $scores;
	}

	private function get_min_to_app($id_project)
	{
		$this->db->select('description,end,start');
		$this->db->from('min_to_app');
		$this->db->join('general_score', 'min_to_app.id_general_score = general_score.id_general_score');
		$this->db->where('min_to_app.id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$score = new Quality_Score();
			$score->set_description($row->description);
			$score->set_end_interval($row->end);
			$score->set_start_interval($row->start);
			return $score;
		}
		return null;
	}

	private function get_qas($id_project)
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

	private function get_qes($id_project)
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

	public function get_all_languages()
	{
		$languages = array();
		$this->db->select('*');
		$this->db->from('language');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($languages, $row->description);
		}
		return $languages;
	}

	public function get_all_study_types()
	{
		$types = array();
		$this->db->select('*');
		$this->db->from('study_type');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($types, $row->description);
		}
		return $types;
	}

	public function get_all_databases()
	{
		$databases = array();
		$this->db->select('*');
		$this->db->from('data_base');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($databases, $row->name);
		}
		return $databases;
	}

	public function get_all_rules()
	{
		$rules = array();
		$this->db->select('*');
		$this->db->from('rule');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($rules, $row->description);
		}
		return $rules;
	}

	public function get_all_types()
	{
		$rules = array();
		$this->db->select('*');
		$this->db->from('types_question');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($rules, $row->type);
		}
		return $rules;
	}

	public function get_project_export($id_project)
	{
		$errors = array();
		array_push($errors, $this->update_progress_planning($id_project));
		array_push($errors, $this->update_progress_import($id_project));
		array_push($errors, $this->update_progress_selection($id_project));
		array_push($errors, $this->update_progress_quality($id_project));
		array_push($errors, $this->update_progress_extraction($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
			$project->set_selection($row->selection);
			$project->set_quality($row->quality);
			$project->set_extraction($row->extraction);
		}

		$project->set_members($this->get_members($id_project));
		$project->set_errors($errors);
		$project->set_domains($this->get_domains($id_project));
		$project->set_languages($this->get_languages($id_project));
		$project->set_study_types($this->get_study_types($id_project));
		$project->set_keywords($this->get_keywords($id_project));
		$project->set_databases($this->get_databases($id_project));
		$project->set_research_questions($this->get_rqs($id_project));
		$project->set_search_strategy($this->get_search_strategy($id_project));
		$project->set_search_strings($this->get_search_strings($id_project));
		$project->set_terms($this->get_terms($id_project));
		$project->set_inclusion_rule($this->get_inclusion_rule($id_project));
		$project->set_exclusion_rule($this->get_exclusion_rule($id_project));
		$project->set_inclusion_criteria($this->get_criteria($id_project, "Inclusion"));
		$project->set_exclusion_criteria($this->get_criteria($id_project, "Exclusion"));
		$project->set_quality_scores($this->get_general_scores($id_project));
		$project->set_score_min($this->get_min_to_app($id_project));
		$project->set_questions_quality($this->get_qas($id_project));
		$project->set_questions_extraction($this->get_qes($id_project));

		return $project;
	}

	public function get_project_import($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
		}

		$project->set_databases($this->get_databases($id_project));
		$project->set_errors($errors);

		return $project;
	}

	public function get_num_papers($id_project)
	{
		$data2 = array();
		foreach ($this->get_databases($id_project) as $database) {
			$id_database = $this->get_id_database($database->get_name());

			$id_project_database = $this->get_id_project_database($id_database, $id_project);

			$id_bib = $this->get_ids_bibs($id_project_database);

			if (sizeof($id_bib) > 0) {
				$this->db->where_in('id_bib', $id_bib);
				$this->db->from('papers');
				$data2[$database->get_name()] = $this->db->count_all_results();
			} else {
				$data2[$database->get_name()] = 0;
			}
		}
		return $data2;
	}

	public function get_name_bibs($id_project)
	{
		$data2 = array();
		foreach ($this->get_databases($id_project) as $database) {
			$id_database = $this->get_id_database($database->get_name());
			$id_project_database = $this->get_id_project_database($id_database, $id_project);

			$this->db->select('name');
			$this->db->from('bib_upload');
			$this->db->where('id_project_database', $id_project_database);
			$query = $this->db->get();

			$data = array();
			foreach ($query->result() as $row) {
				array_push($data, $row->name);
			}
			$data2[$database->get_name()] = $data;
		}
		return $data2;
	}

	private function get_num_bib($database, $id_project)
	{
		$id_database = $this->get_id_database($database);
		$id_project_database = $this->get_id_project_database($id_database, $id_project);

		$this->db->where('id_project_database', $id_project_database);
		$this->db->from('bib_upload');
		return $this->db->count_all_results();
	}

	private function get_papers_selection($id_project)
	{
		$papers = array();
		$id_bibs = array();
		$ids_project_database = $this->get_ids_project_database($id_project);

		if (sizeof($ids_project_database) > 0) {
			$id_bibs = $this->get_ids_bibs($ids_project_database);
		}

		if (sizeof($id_bibs) > 0) {

			$id_user = $this->get_id_name_user($this->session->email);
			$id_member = $this->get_id_member($id_user[0], $id_project);

			$this->db->select('papers.title,papers.id,papers.id_paper,papers.author,papers.year, data_base.name');
			$this->db->from('papers');
			$this->db->join('data_base', 'papers.data_base = data_base.id_database');
			$this->db->where_in('id_bib', $id_bibs);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$p = new Paper();
				$p->set_id($row->id);
				$p->set_title($row->title);
				$p->set_author($row->author);
				$p->set_database($row->name);
				$p->set_year($row->year);

				$this->db->select('id_status');
				$this->db->from('papers_selection');
				$this->db->where('id_member', $id_member);
				$this->db->where('id_paper', $row->id_paper);
				$query6 = $this->db->get();

				foreach ($query6->result() as $row2) {
					$p->set_status_selection($row2->id_status);
				}
				array_push($papers, $p);

			}
		}
		return $papers;
	}

	public function get_project_selection($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
		}

		$project->set_inclusion_rule($this->get_inclusion_rule($id_project));
		$project->set_exclusion_rule($this->get_exclusion_rule($id_project));
		$project->set_inclusion_criteria($this->get_criteria($id_project, "Inclusion"));
		$project->set_exclusion_criteria($this->get_criteria($id_project, "Exclusion"));
		$project->set_papers($this->get_papers_selection($id_project));

		$project->set_errors($errors);

		return $project;
	}

	public function get_level($email, $id_project)
	{
		$this->db->select('level');
		$this->db->from('user');
		$this->db->join('members', 'members.id_user = user.id_user');
		$this->db->where('user.email', $email);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			return $row->level;
		}
		return null;
	}

	public function get_users($id)
	{
		$users = array();
		$id_users = $this->get_ids_users($id);

		$this->db->select('user.*');
		$this->db->from('user');
		$this->db->where_not_in('id_user', $id_users);
		$query = $this->db->get();

		foreach ($query->result() as $row) {

			$user = new User();
			$user->set_name($row->name);
			$user->set_email($row->email);
			array_push($users, $user);
		}
		return $users;
	}

	public function get_levels()
	{
		$levels = array();
		$this->db->select('*');
		$this->db->from('levels');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($levels, $row->level);
		}
		return $levels;
	}

	public function deleted_project($id_project)
	{
		$this->db->where('id_project', $id_project);
		$this->db->delete('project');

	}

	public function count_papers_reviewer($id_project)
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
		if (sizeof($id_papers) > 0) {
			foreach ($this->get_members($id_project) as $mem) {
				$level = $this->get_level($mem->get_email(), $id_project);
				if ($level == 1 || $level == 3) {
					$id_user = $this->get_id_name_user($mem->get_email());
					$id_member = $this->get_id_member($id_user[0], $id_project);
					$total = 0;
					$cont[1] = 0;
					$cont[2] = 0;
					$cont[3] = 0;
					$cont[4] = 0;
					$cont[5] = 0;
					$this->db->select('id_status, COUNT(*) as count');
					$this->db->from('papers_selection');
					$this->db->group_by('id_status');
					$this->db->where('id_member', $id_member);
					$this->db->where_in('id_paper', $id_papers);
					$query = $this->db->get();

					foreach ($query->result() as $row) {
						$cont[$row->id_status] = $row->count;
						$total += $row->count;
					}
					$cont[6] = $total;
					$data[$mem->get_email()] = $cont;
				}
			}
		}


		return $data;
	}

	public function count_papers_sel_by_user($id_project)
	{
		$project_databases = $this->get_ids_project_database($id_project);
		$total = 0;
		$cont[1] = 0;
		$cont[2] = 0;
		$cont[3] = 0;
		$cont[4] = 0;
		$cont[5] = 0;
		$cont[6] = 0;

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		$id_papers = array();
		if (sizeof($id_bibs) > 0) {
			$id_papers = $this->get_ids_papers($id_bibs);
		}
		if (sizeof($id_papers) > 0) {
			$id_user = $this->get_id_name_user($this->session->email);
			$id_member = $this->get_id_member($id_user[0], $id_project);
			$this->db->select('id_status, COUNT(*) as count');
			$this->db->from('papers_selection');
			$this->db->group_by('id_status');
			$this->db->where('id_member', $id_member);
			$this->db->where_in('id_paper', $id_papers);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$cont[$row->id_status] = $row->count;
				$total += $row->count;
			}
			$cont[6] = $total;
		}


		return $cont;
	}

	public function get_logs_project($id_project)
	{
		$data = array();
		$this->db->select('name,activity,time');
		$this->db->from('activity_log');
		$this->db->join('user', 'user.id_user = activity_log.id_user');
		$this->db->where('activity_log.id_project', $id_project);
		$this->db->order_by('activity_log.time DESC');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$data2 = array(
				'name' => $row->name,
				'activity' => $row->activity,
				'time' => $row->time
			);
			array_push($data, $data2);
		}

		return $data;
	}

	public function add_member($email, $level, $id_project)
	{
		$id_level = null;
		$this->db->select('id_level');
		$this->db->from('levels');
		$this->db->where('level', $level);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_level = $row->id_level;
		}

		$id_user = $this->get_id_name_user($email);

		$data = array(
			'id_user' => $id_user[0],
			'id_project' => $id_project,
			'level' => $id_level
		);

		$this->db->insert('members', $data);
		$id_member = $this->db->insert_id();
		if ($id_level == 1 || $id_level == 3) {

			$project_databases = $this->get_ids_project_database($id_project);

			$id_bibs = array();
			if (sizeof($project_databases) > 0) {
				$id_bibs = $this->get_ids_bibs($project_databases);
			}

			$id_papers = array();
			if (sizeof($id_bibs) > 0) {
				$id_papers = $this->get_ids_papers($id_bibs);
			}

			if (sizeof($id_papers) > 0) {
				$status_selection = array();
				foreach ($id_papers as $paper) {
					$insert = array(
						'id_paper' => $paper,
						'id_member' => $id_member,
						'id_status' => 3,
						'note' => ""
					);
					array_push($status_selection, $insert);

				}

				$this->db->insert_batch('papers_selection', $status_selection);

				$data = array(
					'status_selection' => 3,
					'check_status_selection' => false,
				);

				$this->db->where_in('id_paper', $id_papers);
				$this->db->update('papers', $data);
			}
		}
		return $id_user[1];
	}

	public function get_status()
	{
		$levels = array();
		$this->db->select('*');
		$this->db->from('status_selection');
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			array_push($levels, array($row->id_status, $row->description));
		}
		return $levels;
	}

	public function edit_project($title, $description, $objectives, $id_project)
	{
		$data = array(
			'title' => $title,
			'description' => $description,
			'objectives' => $objectives
		);
		$this->db->where('id_project', $id_project);
		$this->db->update('project', $data);
	}

	public function get_project_reviewer_selection($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
		}


		$project->set_members($this->get_members($id_project));
		$project->set_errors($errors);

		return $project;
	}

	public function get_project_quality($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));
		$errors = array_merge($errors, $this->update_progress_selection($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
			$project->set_selection($row->selection);
		}

		$project->set_errors($errors);

		return $project;
	}

	public function get_project_extraction($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));
		$errors = array_merge($errors, $this->update_progress_selection($id_project));
		$errors = array_merge($errors, $this->update_progress_quality($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
			$project->set_selection($row->selection);
			$project->set_quality($row->quality);
		}

		$project->set_errors($errors);

		return $project;
	}

	public function get_project_report($id_project)
	{
		$errors = array();
		$errors = array_merge($errors, $this->update_progress_planning($id_project));
		$errors = array_merge($errors, $this->update_progress_import($id_project));
		$errors = array_merge($errors, $this->update_progress_selection($id_project));
		$errors = array_merge($errors, $this->update_progress_quality($id_project));
		$errors = array_merge($errors, $this->update_progress_extraction($id_project));

		$project = new Project();
		$this->db->select('project.*');
		$this->db->from('project');
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$project->set_title($row->title);
			$project->set_id($row->id_project);
			$project->set_planning($row->planning);
			$project->set_import($row->import);
			$project->set_selection($row->selection);
			$project->set_quality($row->quality);
			$project->set_extraction($row->extraction);
		}

		$project->set_errors($errors);

		return $project;
	}

	public function delete_member($email, $id_project)
	{
		$this->validate_adm($email, $id_project);
		$user = $this->get_id_name_user($email);

		$this->db->where('id_project', $id_project);
		$this->db->where('id_user', $user[0]);
		$this->db->delete('members');

		$project_databases = $this->get_ids_project_database($id_project);

		$id_bibs = array();
		if (sizeof($project_databases) > 0) {
			$id_bibs = $this->get_ids_bibs($project_databases);
		}

		if (sizeof($id_bibs) > 0) {

			$this->db->select('id_paper');
			$this->db->from('papers');
			$this->db->where_in('id_bib', $id_bibs);
			$query = $this->db->get();
			$papers = array();
			foreach ($query->result() as $row) {
				array_push($papers, $row->id_paper);
			}


			foreach ($papers as $id_paper) {
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
						'status_selection' => $paper[0]
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
		}
	}

	/**
	 * @param $email
	 * @param $level
	 * @param $id_project
	 * @return bool
	 * @throws Exception
	 */
	public function edit_level($email, $level, $id_project)
	{
		$this->validate_adm($email, $id_project);

		$id_level = null;
		$this->db->select('id_level');
		$this->db->from('levels');
		$this->db->where('level', $level);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_level = $row->id_level;
		}

		$id_user = $this->get_id_name_user($email);

		$old_level = null;
		$this->db->select('id_level');
		$this->db->from('levels');
		$this->db->join('members', 'members.level = levels.id_level');
		$this->db->where('id_user', $id_user[0]);
		$this->db->where('id_project', $id_project);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$old_level = $row->id_level;
		}

		if ($id_level == $old_level) {
			return true;
		}

		$id_member = null;
		$this->db->select('id_members');
		$this->db->from('members');
		$this->db->where('id_user', $id_user[0]);
		$this->db->where('id_project', $id_project);
		$this->db->where('level', $old_level);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$id_member = $row->id_members;
		}

		$data = array(
			'level' => $id_level
		);

		$this->db->where('id_members', $id_member);
		$this->db->update('members', $data);


		if ($id_level == 1 || $id_level == 3) {

			if ($old_level != 2 && $old_level != 3) {
				$project_databases = $this->get_ids_project_database($id_project);

				$id_bibs = array();
				if (sizeof($project_databases) > 0) {
					$id_bibs = $this->get_ids_bibs($project_databases);
				}

				$id_papers = array();
				if (sizeof($id_bibs) > 0) {
					$id_papers = $this->get_ids_papers($id_bibs);
				}

				if (sizeof($id_papers) > 0) {
					$status_selection = array();
					foreach ($id_papers as $paper) {
						$insert = array(
							'id_paper' => $paper,
							'id_user' => $id_user[0],
							'id_status' => 3,
							'note' => ""
						);
						array_push($status_selection, $insert);

					}

					$this->db->insert_batch('papers_selection', $status_selection);
					$data = array(
						'status_selection' => 3,
						'check_status_selection' => false,
					);

					$this->db->where_in('id_paper', $id_papers);
					$this->db->update('papers', $data);
				}
			}
		}
	}

	/**
	 * @param $email
	 * @param $id_project
	 * @return bool
	 * @throws Exception
	 */
	private function validate_adm($email, $id_project)
	{
		$members = $this->get_members($id_project);
		if (sizeof($members) == 1) {
			throw new Exception('The project must contain at least one member and this is the administrator.');
		}

		foreach ($members as $mem) {
			if ($mem->get_level() == "Administrator") {
				if ($mem->get_email() != $email) {
					return true;
				}
			}
		}
		throw new Exception('The project must contain at least one member and this is the administrator.');
	}
}

