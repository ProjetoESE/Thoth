<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Pattern_Controller.php';

class Project_Controller extends Pattern_Controller
{
	/**
	 * @param $id
	 */
	public function open($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->export_latex($id);

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_overview($id);
			$data['logs'] = $this->Project_Model->get_logs_project($id);

			$this->load_views('pages/project/project', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function planning($id)
	{
		try {

			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_planning($id);
			$data['languages'] = $this->Project_Model->get_all_languages();
			$data['study_types'] = $this->Project_Model->get_all_study_types();
			$data['databases'] = $this->Project_Model->get_all_databases();
			$data['rules'] = $this->Project_Model->get_all_rules();
			$data['question_types'] = $this->Project_Model->get_all_types();

			$this->load_views('pages/project/project_planning', $data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function conducting($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_import($id);
			$data['bib'] = $this->Project_Model->get_name_bibs($id);
			$data['num_papers'] = $this->Project_Model->get_num_papers($id);


			$this->load_views('pages/project/project_conducting', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function study_selection($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_selection($id);
			$data['count_papers'] = $this->Project_Model->count_papers_sel_by_user($id);

			$this->load_views('pages/project/project_study_selection', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function reporting($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_report($id);
			$data['databases'] = $this->Project_Model->get_papers_database($id);
			$data['status_selection'] = $this->Project_Model->get_papers_status_selection($id);
			$data['status_qa'] = $this->Project_Model->get_papers_status_quality($id);
			$data['funnel'] = $this->Project_Model->get_papers_step($id);
			$data['activity'] = $this->Project_Model->get_act_project($id);
			$data['gen_score'] = $this->Project_Model->get_papers_score_quality($id);
			$data['extraction'] = $this->Project_Model->get_data_qes_select($id);
			$data['multiple'] = $this->Project_Model->get_data_qes_multiple($id);

			$this->load_views('pages/project/project_reporting', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function review_study_selection($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_reviewer_selection($id);
			$data['count_project'] = $this->Project_Model->count_papers_by_status_sel($id);
			$data['count_papers'] = $this->Project_Model->count_papers_reviewer($id);
			$data['status'] = $this->Project_Model->get_status();

			$this->load->model("Selection_Model");
			$data['conflicts'] = $this->Selection_Model->get_conflicts($id);

			$this->load_views('pages/project/project_review_study_selection', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function review_qa($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_quality($id);
			$data['count_project'] = $this->Project_Model->count_papers_by_status_qa($id);
			$data['count_papers'] = $this->Project_Model->count_papers_reviewer_qa($id);
			$data['status'] = $this->Project_Model->get_status_qa();

			$this->load->model("Quality_Model");
			$data['conflicts'] = $this->Quality_Model->get_conflicts($id);

			$this->load_views('pages/project/project_review_qa', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function quality_assessment($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_quality($id);
			$data['count_papers'] = $this->Project_Model->count_papers_qa_by_user($id);
			$data['qas_score'] = $this->Project_Model->get_evaluation_qa($id);

			$this->load_views('pages/project/project_quality_assessment', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function data_extraction($id)
	{
		try {
			$this->validate_level($id, array(1, 2, 3, 4));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_extraction($id);
			$data['count_papers'] = $this->Project_Model->count_papers_extraction($id);

			$this->load_views('pages/project/project_data_extraction', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function new_project()
	{
		try {
			$this->logged_in();
			load_templates('pages/project/project_new', null);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function add_research($id)
	{
		try {
			$this->validate_level($id, array(1));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_members($id);
			$data['users'] = $this->Project_Model->get_users($id);
			$data['levels'] = $this->Project_Model->get_levels();

			$this->load_views('pages/project/project_add_research', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id
	 */
	public function edit($id)
	{
		try {
			$this->validate_level($id, array(1));

			$this->load->model("Project_Model");
			$data['project'] = $this->Project_Model->get_project_edit($id);

			$this->load_views('pages/project/project_edit', $data);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function created_project()
	{
		try {
			$this->logged_in();

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');

			$this->load->model("Project_Model");
			$id_project = $this->Project_Model->created_project($title, $description, $objectives, $this->session->email);

			$activity = "Created the project " . $title;
			$this->insert_log($activity, 1, $id_project);

			redirect('open/' . $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function add_member()
	{
		try {
			$email = $this->input->post('email');
			$id_project = $this->input->post('id_project');
			$level = $this->input->post('level');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$name = $this->Project_Model->add_member($email, $level, $id_project);

			$activity = "Added member " . $email;
			$this->insert_log($activity, 1, $id_project);

			echo $name;

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function edited_project()
	{
		try {
			$title = $this->input->post('title');
			$id_project = $this->input->post('id_project');
			$description = $this->input->post('description');
			$objectives = $this->input->post('objectives');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->edit_project($title, $description, $objectives, $id_project);

			$activity = "Edited project";
			$this->insert_log($activity, 1, $id_project);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 *
	 */
	public function deleted_project()
	{
		try {
			$id_project = $this->input->post('id_project');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->deleted_project($id_project);

			$activity = "Deleted project " . $id_project;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id_project
	 */
	private function export_doc($id_project)
	{
		try {
			require_once(APPPATH . 'third_party/vendor/autoload.php');

			$this->load->model('Project_Model');

			$project = $this->Project_Model->get_project_export($id_project);
			$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_url('export/template.docx'));

			$templateProcessor->setValue('title', $project->get_title());

			$members = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$members .= $member->get_name();
				} else {
					$members .= $member->get_name() . ", ";
				}
			}
			$templateProcessor->setValue('member', $members);

			$emails = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$emails .= $member->get_email();
				} else {
					$emails .= $member->get_email() . ", ";
				}
			}
			$templateProcessor->setValue('email', $emails);

			$inst = "";
			$array = $project->get_members();
			foreach ($array as $key => $member) {
				end($array);
				if ($key === key($array)) {
					$inst .= $member->get_institution();
				} else {
					$inst .= $member->get_institution() . ", ";
				}

			}
			$templateProcessor->setValue('instituition', $inst);

			$templateProcessor->setValue('description', $project->get_description());

			$templateProcessor->setValue('objectives', $project->get_objectives());

			$domains = "";
			$array = $project->get_domains();
			foreach ($array as $key => $domain) {
				end($array);
				if ($key === key($array)) {
					$domains .= $domain;
				} else {
					$domains .= $domain . ", ";
				}
			}
			$templateProcessor->setValue('domain', $domains);

			$languages = "";
			$array = $project->get_languages();
			foreach ($array as $key => $language) {
				end($array);
				if ($key === key($array)) {
					$languages .= $language;
				} else {
					$languages .= $language . ", ";
				}

			}
			$templateProcessor->setValue('language', $languages);

			$studies = "";
			$array = $project->get_study_types();
			foreach ($array as $key => $study) {
				end($array);
				if ($key === key($array)) {
					$studies .= $study;
				} else {
					$studies .= $study . ", ";
				}
			}
			$templateProcessor->setValue('study_type', $studies);

			$keywords = "";
			$array = $project->get_keywords();
			foreach ($array as $key => $keyword) {
				end($array);
				if ($key === key($array)) {
					$keywords .= $keyword;
				} else {
					$keywords .= $keyword . ", ";
				}
			}
			$templateProcessor->setValue('keyword', $keywords);

			$research = $project->get_research_questions();
			$size = sizeof($research);
			$templateProcessor->cloneRow('id_rq', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_rq#' . ($i + 1);
				$id2 = 'rq_desc#' . ($i + 1);
				$templateProcessor->setValue($id1, $research[$i]->get_id());
				$templateProcessor->setValue($id2, $research[$i]->get_description());
			}

			$databases = $project->get_databases();
			$size = sizeof($databases);
			$templateProcessor->cloneRow('db_name', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'db_name#' . ($i + 1);
				$id2 = 'db_link#' . ($i + 1);
				$templateProcessor->setValue($id1, $databases[$i]->get_name());
				$templateProcessor->setValue($id2, $databases[$i]->get_link());
			}

			$terms = $project->get_terms();
			$size = sizeof($terms);
			$templateProcessor->cloneRow('term', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'term#' . ($i + 1);
				$id2 = 'synonym#' . ($i + 1);
				$templateProcessor->setValue($id1, $terms[$i]->get_description());
				$synonyms = "";
				$array = $terms[$i]->get_synonyms();
				foreach ($array as $key => $syn) {
					end($array);
					if ($key === key($array)) {
						$synonyms .= $syn;
					} else {
						$synonyms .= $syn . ' OR ';
					}

				}
				$templateProcessor->setValue($id2, $synonyms);
			}

			$strings = $project->get_search_strings();
			$size = sizeof($strings);
			$templateProcessor->cloneRow('db_string', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'db_string#' . ($i + 1);
				$id2 = 'string#' . ($i + 1);
				$templateProcessor->setValue($id1, $strings[$i]->get_database()->get_name());
				$templateProcessor->setValue($id2, $strings[$i]->get_description());
			}

			$templateProcessor->setValue('strategy', $project->get_search_strategy());

			$templateProcessor->setValue('inclusion_rule', $project->get_inclusion_rule());
			$in_criteria = $project->get_inclusion_criteria();
			$size = sizeof($in_criteria);
			$templateProcessor->cloneRow('id_inclusion', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_inclusion#' . ($i + 1);
				$id2 = 'in_criteria#' . ($i + 1);
				$templateProcessor->setValue($id1, $in_criteria[$i]->get_id());
				$templateProcessor->setValue($id2, $in_criteria[$i]->get_description());
			}

			$templateProcessor->setValue('exclusion_rule', $project->get_exclusion_rule());
			$ex_criteria = $project->get_exclusion_criteria();
			$size = sizeof($ex_criteria);
			$templateProcessor->cloneRow('id_exclusion', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_exclusion#' . ($i + 1);
				$id2 = 'ex_criteria#' . ($i + 1);
				$templateProcessor->setValue($id1, $ex_criteria[$i]->get_id());
				$templateProcessor->setValue($id2, $ex_criteria[$i]->get_description());
			}

			$score_min = $project->get_score_min();

			if (is_null($score_min)) {
				$templateProcessor->setValue('ge_min_to_app', "");
			} else {
				$templateProcessor->setValue('ge_min_to_app', $score_min->get_description());
			}

			$qa_scores = $project->get_quality_scores();
			$size = sizeof($qa_scores);
			$templateProcessor->cloneRow('start_in', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'start_in#' . ($i + 1);
				$id2 = 'end_in#' . ($i + 1);
				$id3 = 'ge_score#' . ($i + 1);
				$templateProcessor->setValue($id1, $qa_scores[$i]->get_start_interval());
				$templateProcessor->setValue($id2, $qa_scores[$i]->get_end_interval());
				$templateProcessor->setValue($id3, $qa_scores[$i]->get_description());
			}

			$qa_questions = $project->get_questions_quality();
			$size = sizeof($qa_questions);
			$templateProcessor->cloneRow('id_qa', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_qa#' . ($i + 1);
				$id2 = 'description_qa#' . ($i + 1);
				$id3 = 'rules_qa#' . ($i + 1);
				$id4 = 'weight#' . ($i + 1);
				$id5 = 'min_to_app#' . ($i + 1);
				$templateProcessor->setValue($id1, $qa_questions[$i]->get_id());
				$templateProcessor->setValue($id2, $qa_questions[$i]->get_description());

				$rules = $qa_questions[$i]->get_scores();
				$scores = "";
				$len = sizeof($rules);
				for ($j = 0; $j < $len; $j++) {
					$scores .= $rules[$j]->get_score_rule() . " - " . $rules[$j]->get_description() . ";\n";

				}
				$templateProcessor->setValue($id3, $scores);

				$templateProcessor->setValue($id4, $qa_questions[$i]->get_weight());
				$minimum = $qa_questions[$i]->get_min_to_approve();
				if ($minimum != null) {
					$templateProcessor->setValue($id5, $minimum->get_score_rule());
				} else {
					$templateProcessor->setValue($id5, "");
				}
			}

			$qe_questions = $project->get_questions_extraction();
			$size = sizeof($qe_questions);
			$templateProcessor->cloneRow('id_qe', $size);
			for ($i = 0; $i < $size; $i++) {
				$id1 = 'id_qe#' . ($i + 1);
				$id2 = 'description_qe#' . ($i + 1);
				$id3 = 'type#' . ($i + 1);
				$id4 = 'option#' . ($i + 1);
				$templateProcessor->setValue($id1, $qe_questions[$i]->get_id());
				$templateProcessor->setValue($id2, $qe_questions[$i]->get_description());
				$templateProcessor->setValue($id3, $qe_questions[$i]->get_type());

				$ops = $qe_questions[$i]->get_options();
				$options = "";
				$len = sizeof($ops);
				for ($j = 0; $j < $len; $j++) {
					$options .= $ops[$j] . ";\n";
				}
				$templateProcessor->setValue($id4, $options);

			}

			//$file = 'C:\xampp\htdocs\Thoth\export\P' . $id_project . '.docx';
			$file = './export/P' . $id_project . '.docx';
			$templateProcessor->saveAs($file);

		} catch
		(Exception $e) {
			$this->session->set_flashdata('error', $e->getMessage());
			redirect(base_url());
		}
	}

	/**
	 * @param $id_project
	 */
	private function export_latex($id_project)
	{
		$this->load->model('Project_Model');
		$project = $this->Project_Model->get_project_export($id_project);
		$file = fopen("./export/" . $id_project . ".txt", "w");

		//Config File Latex
		fwrite($file, "\documentclass [11pt]{article}\n");
		fwrite($file, "\usepackage[utf8]{inputenc}\n");
		fwrite($file, "\usepackage{graphicx}\n");
		fwrite($file, "\usepackage{booktabs}\n");
		fwrite($file, "\usepackage{float}\n");

		//Title
		fwrite($file, "\\title{" . $project->get_title() . "}\n");

		//Author
		$members = "";
		$array = $project->get_members();
		foreach ($array as $key => $member) {
			end($array);
			if ($key === key($array)) {
				$members .= $member->get_name() . " (" . $member->get_email() . ")";
			} else {
				$members .= $member->get_name() . " (" . $member->get_email() . "),\\\ ";
			}
		}
		fwrite($file, "\\author{" . $members . "}");
		fwrite($file, "\n");

		//Document
		fwrite($file, "\begin{document}\n");
		fwrite($file, "\maketitle\n");
		fwrite($file, "\n");

		//Abstract
		fwrite($file, "\begin{abstract}\n");
		fwrite($file, "\\end{abstract}\n");
		fwrite($file, "\n");

		//Planning
		fwrite($file, "\section{Planning}\n");
		fwrite($file, "\n");

		//Description
		fwrite($file, "\subsection{Description}\n");
		fwrite($file, $project->get_description() . "\n");
		fwrite($file, "\n");

		//Objectives
		fwrite($file, "\subsection{Objectives}\n");
		fwrite($file, $project->get_objectives() . "\n");
		fwrite($file, "\n");

		//Domains
		fwrite($file, "\subsection{Domains}\n");
		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_domains() as $domain) {
			fwrite($file, "	\item " . $domain . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		//Languages
		fwrite($file, "\subsection{Languages}\n");
		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_languages() as $language) {
			fwrite($file, "	\item " . $language . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		//Study Types
		fwrite($file, "\subsection{Studies Types}\n");
		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_study_types() as $study) {
			fwrite($file, "	\item " . $study . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		//Keywords
		fwrite($file, "\subsection{Keywords}\n");
		$keywords = "";
		$array = $project->get_keywords();
		foreach ($array as $key => $keyword) {
			end($array);
			if ($key === key($array)) {
				$keywords .= $keyword . ".";
			} else {
				$keywords .= $keyword . ", ";
			}
		}
		fwrite($file, $keywords . "\n");
		fwrite($file, "\n");

		//Research Questions
		fwrite($file, "\subsection{Research Questions}\n");
		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_research_questions() as $research) {
			fwrite($file, "	\item \\textbf{" . $research->get_id() . "} " . $research->get_description() . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		//DataBases
		fwrite($file, "\subsection{Databases}\n");
		fwrite($file, "\begin{table}[!htb]\n");
		fwrite($file, "\caption[Databases used at work]{Databases used at work.}\n");
		fwrite($file, "\label{tab:databases}\n");
		fwrite($file, "\centering\n");
		fwrite($file, "\begin{tabular}{@{}ll@{}}\n");
		fwrite($file, "\\toprule\n");

		fwrite($file, "\\textbf{Database} & \\textbf{Link} \\\ \midrule\n");

		$array = $project->get_databases();
		foreach ($array as $key => $database) {
			end($array);
			if ($key === key($array)) {
				fwrite($file, $database->get_name() . " & " . $database->get_link() . " \\\ \bottomrule \n");
			} else {
				fwrite($file, $database->get_name() . " & " . $database->get_link() . " \\\ \n");
			}
		}

		fwrite($file, "\\end{tabular}\n");
		fwrite($file, "\\end{table}\n");
		fwrite($file, "\n");


		//Terms e Synonyms
		fwrite($file, "\subsection{Terms and Synonyms}\n");
		fwrite($file, "\begin{table}[H]\n");
		fwrite($file, "\caption[Terms and Synonyms used at work]{Terms and Synonyms used at work.}\n");
		fwrite($file, "\label{tab:terms}\n");
		fwrite($file, "\centering\n");
		fwrite($file, "\begin{tabular}{@{}ll@{}}\n");
		fwrite($file, "\\toprule\n");

		fwrite($file, "\\textbf{Term} & \\textbf{Synonyms} \\\ \midrule\n");

		foreach ($project->get_terms() as $term) {
			$synonyms = "\begin{tabular}[c]{@{}l@{}}";
			foreach ($term->get_synonyms() as $syn) {
				$synonyms .= $syn . "\\\\";
			}
			$synonyms .= "\\end{tabular}";
			fwrite($file, $term->get_description() . " & " . $synonyms . " \\\ \bottomrule \n");
		}

		fwrite($file, "\\end{tabular}\n");
		fwrite($file, "\\end{table}\n");
		fwrite($file, "\n");


		//Strings
		fwrite($file, "\subsection{Search Strings}\n");
		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_search_strings() as $string) {
			fwrite($file, "\item \\textbf{" . $string->get_database()->get_name() . ": }" . $string->get_description() . "; \n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");


		//Search Strategy
		fwrite($file, "\subsection{Search Strategy}\n");
		fwrite($file, $project->get_search_strategy() . "\n");
		fwrite($file, "\n");


		//Inclusion and Exclusion Criteria
		fwrite($file, "\subsection{Inclusion and Exclusion Criteria}\n");

		fwrite($file, "Inclusion Rule: " . $project->get_inclusion_rule() . "\n");
		fwrite($file, "\n");

		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_inclusion_criteria() as $ic) {
			fwrite($file, "\item \\textbf{" . $ic->get_id() . ": }" . $ic->get_description() . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		fwrite($file, "Exclusion Rule: " . $project->get_exclusion_rule() . "\n");
		fwrite($file, "\n");

		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_exclusion_criteria() as $ic) {
			fwrite($file, "\item \\textbf{" . $ic->get_id() . ": }" . $ic->get_description() . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		//General Scores
		fwrite($file, "\subsection{General Scores}\n");

		$score_min = $project->get_score_min();

		if (is_null($score_min)) {
			fwrite($file, "Score Minimum to Approve: Not minimum.\n");
		} else {
			fwrite($file, "Score Minimum to Approve: " . $score_min->get_description() . ".\n");
		}
		fwrite($file, "\n");

		fwrite($file, "\begin{table}[!htb]\n");
		fwrite($file, "\caption[General Scores used at work]{General Score used at work.}\n");
		fwrite($file, "\label{tab:genscores}\n");
		fwrite($file, "\centering\n");
		fwrite($file, "\begin{tabular}{@{}lll@{}}\n");
		fwrite($file, "\\toprule\n");

		fwrite($file, "\\textbf{Start Interval} & \\textbf{End Interval} & \\textbf{Description} \\\ \midrule\n");

		foreach ($project->get_quality_scores() as $score) {
			fwrite($file, $score->get_start_interval() . " & " . $score->get_end_interval() . " & " . $score->get_description() . " \\\ \bottomrule \n");
		}

		fwrite($file, "\\end{tabular}\n");
		fwrite($file, "\\end{table}\n");
		fwrite($file, "\n");


		//Quality Questions
		fwrite($file, "\subsection{Quality Questions}\n");

		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_questions_quality() as $qa) {
			fwrite($file, "\item \\textbf{" . $qa->get_id() . ": } " . $qa->get_description() . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");


		fwrite($file, "\begin{table}[!htb]\n");
		fwrite($file, "\caption[Quality Questions used at work]{Quality Questions used at work.}\n");
		fwrite($file, "\label{tab:qa}\n");
		fwrite($file, "\centering\n");
		fwrite($file, "\begin{tabular}{@{}llll@{}}\n");
		fwrite($file, "\\toprule\n");

		fwrite($file, "\\textbf{ID} & \\textbf{Rules} & \\textbf{Weight} & \\textbf{\begin{tabular}[c]{@{}l@{}}Minimum\\ to\\ Approve\\end{tabular}} \\\ \midrule\n");

		foreach ($project->get_questions_quality() as $qa) {
			$scores = "\begin{tabular}[c]{@{}l@{}}";
			foreach ($qa->get_scores() as $s) {
				$scores .= $s->get_score_rule() . "\\\\";
			}
			$scores .= "\\end{tabular}";

			$minimum = $qa->get_min_to_approve();
			$min = "Not exist minimum";
			if ($minimum != null) {
				$min = $minimum->get_score_rule();
			}

			fwrite($file, $qa->get_id() . "& " . $scores . " & " . $qa->get_weight() . " & " . $min . " \\\ \bottomrule \n");
		}

		fwrite($file, "\\end{tabular}\n");
		fwrite($file, "\\end{table}\n");
		fwrite($file, "\n");


		//Extraction Questions
		fwrite($file, "\subsection{Extraction Questions}\n");

		fwrite($file, "\begin{itemize}\n");
		foreach ($project->get_questions_extraction() as $qe) {
			fwrite($file, "\item \\textbf{" . $qe->get_id() . ": } " . $qe->get_description() . ";\n");
		}
		fwrite($file, "\\end{itemize}\n");
		fwrite($file, "\n");

		fwrite($file, "\begin{table}[!htb]\n");
		fwrite($file, "\caption[Extraction Questions used at work]{Extraction Questions used at work.}\n");
		fwrite($file, "\label{tab:qe}\n");
		fwrite($file, "\centering\n");
		fwrite($file, "\begin{tabular}{@{}lll@{}}\n");
		fwrite($file, "\\toprule\n");

		fwrite($file, "\\textbf{ID} & \\textbf{Type} & \\textbf{Options} \\\ \midrule\n");

		foreach ($project->get_questions_extraction() as $qe) {
			$ops = "\begin{tabular}[c]{@{}l@{}}";
			foreach ($qe->get_options() as $op) {
				$ops .= $op . "\\\\";
			}
			$ops .= "\\end{tabular}";

			fwrite($file, $qe->get_id() . "& " . $qe->get_type() . " & " . $ops . " \\\ \bottomrule \n");
		}

		fwrite($file, "\\end{tabular}\n");
		fwrite($file, "\\end{table}\n");
		fwrite($file, "\n");

		//End Document
		fwrite($file, "\\end{document}\n");

		fclose($file);
	}

	/**
	 *
	 */
	public function delete_member()
	{
		try {
			$id_project = $this->input->post('id_project');
			$email = $this->input->post('email');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->delete_member($email, $id_project);

			$activity = "Deleted member " . $email;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 *
	 */
	public function edit_level()
	{
		try {
			$id_project = $this->input->post('id_project');
			$email = $this->input->post('email');
			$level = $this->input->post('level');

			$this->validate_level($id_project, array(1));

			$this->load->model("Project_Model");
			$this->Project_Model->edit_level($email, $level, $id_project);

			$activity = "Edit level " . $level . " member " . $email;
			$this->insert_log($activity, 1, null);

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


}
