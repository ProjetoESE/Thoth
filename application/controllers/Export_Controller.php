<?php


class Export_Controller extends CI_Controller
{

	public function index()
	{
	}

	public function export_doc()
	{
		require_once('C:\xampp\htdocs\Thoth\application\third_party\vendor\autoload.php');

		$id_project = $this->input->post('id_project');
		$this->load->model('Project_Model');

		$project = $this->Project_Model->get_project($id_project);
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('C:\xampp\htdocs\Thoth\export\template.docx');

		$templateProcessor->setValue('title', $project->get_title());

		$members = "";
		foreach ($project->get_members() as $member) {
			$members .= $member->get_name() . ", ";
		}
		$templateProcessor->setValue('member', $members);

		$emails = "";
		foreach ($project->get_members() as $member) {
			$emails .= $member->get_email() . ", ";
		}
		$templateProcessor->setValue('email', $emails);

		$inst = "";
		foreach ($project->get_members() as $member) {
			$inst .= $member->get_institution() . ", ";
		}
		$templateProcessor->setValue('instituition', $inst);

		$templateProcessor->setValue('description', $project->get_description());

		$templateProcessor->setValue('objectives', $project->get_objectives());

		$domains = "";
		foreach ($project->get_domains() as $domain) {
			$domains .= $domain . ", ";
		}
		$templateProcessor->setValue('domain', $domains);

		$languages = "";
		foreach ($project->get_languages() as $language) {
			$languages .= $language . ", ";
		}
		$templateProcessor->setValue('language', $languages);

		$studies = "";
		foreach ($project->get_study_types() as $study) {
			$studies .= $study . ", ";
		}
		$templateProcessor->setValue('study_type', $studies);

		$keywords = "";
		foreach ($project->get_keywords() as $keyword) {
			$keywords .= $keyword . ", ";
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
			foreach ($terms[$i]->get_synonyms() as $syn) {
				$synonyms .= $syn . ' OR ';
			}
			$templateProcessor->setValue($id2, $synonyms);
		}

		$strings = $project->get_search_strings();
		$size = sizeof($strings);
		$templateProcessor->cloneRow('db_string', $size);
		for ($i = 0; $i < $size; $i++) {
			$id1 = 'db_string#' . ($i + 1);
			$id2 = 'string#' . ($i + 1);
			$templateProcessor->setValue($id1, $strings[$i]->get_database());
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

		$templateProcessor->setValue('ge_min_to_app', $project->get_score_min());
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
				$scores .= $rules[$j]->get_score() . "\n";
			}
			$templateProcessor->setValue($id3, $scores);

			$templateProcessor->setValue($id4, $qa_questions[$i]->get_weight());
			$minimum = $qa_questions[$i]->get_min_to_approve();
			if ($minimum != null) {
				$templateProcessor->setValue($id5, $minimum->get_score());
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
				$options .= $ops[$j] . "\n";
			}
			$templateProcessor->setValue($id4, $options);

		}

		$file = 'C:\xampp\htdocs\Thoth\export\E' . $id_project . '.docx';
		$templateProcessor->saveAs($file);

	}
}
