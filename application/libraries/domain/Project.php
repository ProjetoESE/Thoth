<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Project;
*/

class Project
{
	private $id;
	private $title;
	private $description;
	private $objectives;
	private $created_by;
	private $start_date;
	private $end_date;
	private $has_date;
	private $inclusion_rule;
	private $exclusion_rule;
	private $score_min;
	private $domains = array();
	private $languages = array();
	private $study_types = array();
	private $keywords = array();
	private $research_questions = array();
	private $databases = array();
	private $search_strings = array();
	private $search_strategy;
	private $inclusion_criteria = array();
	private $exclusion_criteria = array();
	private $questions_quality = array();
	private $questions_extraction = array();
	private $papers = array();
	private $terms = array();
	private $members = array();
	private $quality_scores = array();
	private $planning;
	private $import;
	private $selection;
	private $quality;
	private $extraction;
	private $errors = array();

	/**
	 * Project constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @return array
	 */
	public function get_errors()
	{
		return $this->errors;
	}

	/**
	 * @param array $errors
	 * @return Project
	 */
	public function set_errors($errors)
	{
		$this->errors = $errors;
		return $this;
	}


	/**
	 * @return mixed
	 */
	public function get_planning()
	{
		return $this->planning;
	}

	/**
	 * @param mixed $planning
	 * @return Project
	 */
	public function set_planning($planning)
	{
		$this->planning = $planning;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_import()
	{
		return $this->import;
	}

	/**
	 * @param mixed $import
	 * @return Project
	 */
	public function set_import($import)
	{
		$this->import = $import;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_selection()
	{
		return $this->selection;
	}

	/**
	 * @param mixed $selection
	 * @return Project
	 */
	public function set_selection($selection)
	{
		$this->selection = $selection;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_quality()
	{
		return $this->quality;
	}

	/**
	 * @param mixed $quality
	 * @return Project
	 */
	public function set_quality($quality)
	{
		$this->quality = $quality;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_extraction()
	{
		return $this->extraction;
	}

	/**
	 * @param mixed $extraction
	 * @return Project
	 */
	public function set_extraction($extraction)
	{
		$this->extraction = $extraction;
		return $this;
	}

	/**
	 * Method to retrieve the project Id.
	 * @return Integer id
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * Method to change the project Id.
	 * @param Integer $id
	 * @throws InvalidArgumentException
	 */
	public function set_id($id)
	{
		if (is_null($id)) {
			throw  new  InvalidArgumentException("Project Id Invalid!");
		}
		$this->id = $id;
	}


	/**
	 * Method to retrieve the project title.
	 * @return String title
	 */
	public function get_title()
	{
		return $this->title;
	}

	/**
	 * Method to change the project title.
	 * @param String $title
	 * @throws InvalidArgumentException
	 */
	public function set_title($title)
	{
		if (is_null($title)) {
			throw  new  InvalidArgumentException("Project Title Invalid!");
		}
		$this->title = $title;
	}

	/**
	 * Method to retrieve the project description.
	 * @return String description
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the project description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description)) {
			throw  new  InvalidArgumentException("Project Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the project objectives.
	 * @return String objectives
	 */
	public function get_objectives()
	{
		return $this->objectives;
	}

	/**
	 * Method to change the project objectives.
	 * @param String $objectives
	 * @throws InvalidArgumentException
	 */
	public function set_objectives($objectives)
	{
		if (is_null($objectives)) {
			throw  new  InvalidArgumentException("Project Objectives Invalid!");
		}
		$this->objectives = $objectives;
	}

	/**
	 * Method to retrieve the project created by.
	 * @return User created_by
	 */
	public function get_created_by()
	{
		return $this->created_by;
	}

	/**
	 * Method to change the project created by.
	 * @param User $created_by
	 * @throws InvalidArgumentException
	 */
	public function set_created_by($created_by)
	{
		if (is_null($created_by)) {
			throw  new  InvalidArgumentException("Project Created By Invalid!");
		}
		$this->created_by = $created_by;
	}

	/**
	 * Method to retrieve the project start date.
	 * @return DateTime start_date
	 */
	public function get_start_date()
	{
		return $this->start_date;
	}

	/**
	 * Method to change the project start date.
	 * @param DateTime $start_date
	 * @throws InvalidArgumentException
	 */
	public function set_start_date($start_date)
	{
		if (is_null($start_date)) {
			throw  new  InvalidArgumentException("Project Start Date Invalid!");
		}
		$this->start_date = $start_date;
	}

	/**
	 * Method to retrieve the project end date.
	 * @return DateTime end_date
	 */
	public function get_end_date()
	{
		return $this->end_date;
	}

	/**
	 * Method to change the project end date.
	 * @param DateTime $end_date
	 * @throws InvalidArgumentException
	 */
	public function set_end_date($end_date)
	{
		if (is_null($end_date)) {
			throw  new  InvalidArgumentException("Project End Date Invalid!");
		}
		$this->end_date = $end_date;
	}

	/**
	 * Method to retrieve the project end date.
	 * @return DateTime has_date
	 */
	public function get_has_date()
	{
		return $this->has_date;
	}

	/**
	 * Method to change the project has date.
	 * @param DateTime $has_date
	 * @throws InvalidArgumentException
	 */
	public function set_has_date($has_date)
	{
		if (is_null($has_date)) {
			throw  new  InvalidArgumentException("Project Has Date Invalid!");
		}
		$this->has_date = $has_date;
	}

	/**
	 * Method to retrieve the project inclusion rule.
	 * @return Rule_Type inclusion_rule
	 */
	public function get_inclusion_rule()
	{
		return $this->inclusion_rule;
	}

	/**
	 * Method to change the project inclusion rule.
	 * @param Rule_Type $inclusion_rule
	 * @throws InvalidArgumentException
	 */
	public function set_inclusion_rule($inclusion_rule)
	{
		if (is_null($inclusion_rule)) {
			throw  new  InvalidArgumentException("Project Inclusion Rule Invalid!");
		}
		$this->inclusion_rule = $inclusion_rule;
	}

	/**
	 * Method to retrieve the project exclusion rule.
	 * @return Rule_Type exclusion_rule
	 */
	public function get_exclusion_rule()
	{
		return $this->exclusion_rule;
	}

	/**
	 * Method to change the project exclusion rule.
	 * @param Rule_Type $exclusion_rule
	 * @throws InvalidArgumentException
	 */
	public function set_exclusion_rule($exclusion_rule)
	{
		if (is_null($exclusion_rule)) {
			throw  new  InvalidArgumentException("Project Exclusion Rule Invalid!");
		}
		$this->exclusion_rule = $exclusion_rule;
	}

	/**
	 * Method to retrieve the project score min.
	 * @return Quality_Score score_min
	 */
	public function get_score_min()
	{
		return $this->score_min;
	}

	/**
	 * Method to change the project score min.
	 * @param Quality_Score $score_min
	 * @throws InvalidArgumentException
	 */
	public function set_score_min($score_min)
	{

		$this->score_min = $score_min;
	}

	/**
	 * Method to retrieve the project domains.
	 * @return array(String) domains
	 */
	public function get_domains()
	{
		return $this->domains;
	}

	/**
	 * Method to change the project domains.
	 * @param array(String) $domains
	 * @throws InvalidArgumentException
	 */
	public function set_domains($domains)
	{
		if (is_null($domains)) {
			throw  new  InvalidArgumentException("Project Domains Invalid!");
		}

		$this->domains = $domains;
	}

	/**
	 * Method to retrieve the project languages.
	 * @return array(String) languages
	 */
	public function get_languages()
	{
		return $this->languages;
	}

	/**
	 * Method to change the project languages.
	 * @param array(String) $languages
	 * @throws InvalidArgumentException
	 */
	public function set_languages($languages)
	{
		if (is_null($languages)) {
			throw  new  InvalidArgumentException("Project Languages Invalid!");
		}
		$this->languages = $languages;
	}

	/**
	 * Method to retrieve the project study types.
	 * @return array(String) study_types
	 */
	public function get_study_types()
	{
		return $this->study_types;
	}

	/**
	 * Method to change the project study types.
	 * @param array(String) $study_types
	 * @throws InvalidArgumentException
	 */
	public function set_study_types($study_types)
	{
		if (is_null($study_types)) {
			throw  new  InvalidArgumentException("Project Study Types Invalid!");
		}

		$this->study_types = $study_types;
	}

	/**
	 * Method to retrieve the project keywords.
	 * @return array(String) keywords
	 */
	public function get_keywords()
	{
		return $this->keywords;
	}

	/**
	 * Method to change the project keywords.
	 * @param array(String) $keywords
	 * @throws InvalidArgumentException
	 */
	public function set_keywords($keywords)
	{
		if (is_null($keywords)) {
			throw  new  InvalidArgumentException("Project Keywords Invalid!");
		}
		$this->keywords = $keywords;
	}

	/**
	 * Method to retrieve the project research questions.
	 * @return array(Research_Questions) research_questions
	 */
	public function get_research_questions()
	{
		return $this->research_questions;
	}

	/**
	 * Method to change the project research questions.
	 * @param array(Research_Questions) $research_questions
	 * @throws InvalidArgumentException
	 */
	public function set_research_questions($research_questions)
	{
		if (is_null($research_questions)) {
			throw  new  InvalidArgumentException("Project Keywords Invalid!");
		}
		$this->research_questions = $research_questions;
	}

	/**
	 * Method to retrieve the project databases.
	 * @return array(Database) databases
	 */
	public function get_databases()
	{
		return $this->databases;
	}

	/**
	 * Method to change the project databases.
	 * @param array(Database) $databases
	 * @throws InvalidArgumentException
	 */
	public function set_databases($databases)
	{
		if (is_null($databases)) {
			throw  new  InvalidArgumentException("Project Databases Invalid!");
		}
		$this->databases = $databases;
	}

	/**
	 * Method to retrieve the project search strings.
	 * @return array(Search_String) search_strings
	 */
	public function get_search_strings()
	{
		return $this->search_strings;
	}

	/**
	 * Method to change the project search strings.
	 * @param array(Search_String) $search_strings
	 * @throws InvalidArgumentException
	 */
	public function set_search_strings($search_strings)
	{
		if (is_null($search_strings)) {
			throw  new  InvalidArgumentException("Project Search Strings Invalid!");
		}
		$this->search_strings = $search_strings;
	}

	/**
	 * Method to retrieve the project search strategy.
	 * @return String search_strategy
	 */
	public function get_search_strategy()
	{
		return $this->search_strategy;
	}

	/**
	 * Method to change the project search strategy.
	 * @param String $search_strategy
	 * @throws InvalidArgumentException
	 */
	public function set_search_strategy($search_strategy)
	{
		if (is_null($search_strategy)) {
			throw  new  InvalidArgumentException("Project Search Strategy Invalid!");
		}
		$this->search_strategy = $search_strategy;
	}

	/**
	 * Method to retrieve the project criteria inclusion.
	 * @return array(Inclusion_Criteria) inclusion_criteria
	 */
	public function get_inclusion_criteria()
	{
		return $this->inclusion_criteria;
	}

	/**
	 * Method to change the project criteria inclusion.
	 * @param array(Inclusion_Criteria) $inclusion_criteria
	 * @throws InvalidArgumentException
	 */
	public function set_inclusion_criteria($inclusion_criteria)
	{
		if (is_null($inclusion_criteria)) {
			throw  new  InvalidArgumentException("Project Inclusion Criteria Invalid!");
		}
		$this->inclusion_criteria = $inclusion_criteria;
	}

	/**
	 * Method to retrieve the project criteria exclusion.
	 * @return array(Exclusion_Criteria) exclusion_criteria
	 */
	public function get_exclusion_criteria()
	{
		return $this->exclusion_criteria;
	}

	/**
	 * Method to change the project criteria exclusion.
	 * @param array(Exclusion_Criteria) $exclusion_criteria
	 * @throws InvalidArgumentException
	 */
	public function set_exclusion_criteria($exclusion_criteria)
	{
		if (is_null($exclusion_criteria)) {
			throw  new  InvalidArgumentException("Project Exclusion Criteria Invalid!");
		}
		$this->exclusion_criteria = $exclusion_criteria;
	}

	/**
	 * Method to retrieve the project questions quality.
	 * @return array(Questions_Quality) questions_quality
	 */
	public function get_questions_quality()
	{
		return $this->questions_quality;
	}

	/**
	 * Method to change the project questions quality.
	 * @param array(Questions_Quality) $questions_quality
	 * @throws InvalidArgumentException
	 */
	public function set_questions_quality($questions_quality)
	{
		if (is_null($questions_quality)) {
			throw  new  InvalidArgumentException("Project Questions Quality Invalid!");
		}
		$this->questions_quality = $questions_quality;
	}

	/**
	 * Method to retrieve the project questions extraction.
	 * @return array(Questions_extraction) questions_extraction
	 */
	public function get_questions_extraction()
	{
		return $this->questions_extraction;
	}

	/**
	 * Method to change the project questions extraction.
	 * @param array(Questions_extraction) $questions_extraction
	 * @throws InvalidArgumentException
	 */
	public function set_questions_extraction($questions_extraction)
	{
		if (is_null($questions_extraction)) {
			throw  new  InvalidArgumentException("Project Questions extraction Invalid!");
		}
		$this->questions_extraction = $questions_extraction;
	}

	/**
	 * Method to retrieve the project papers.
	 * @return array(Paper) papers
	 */
	public function get_papers()
	{
		return $this->papers;
	}

	/**
	 * Method to change the project papers.
	 * @param array(Paper) $papers
	 * @throws InvalidArgumentException
	 */
	public function set_papers($papers)
	{
		if (is_null($papers)) {
			throw  new  InvalidArgumentException("Project Papers Invalid!");
		}
		$this->papers = $papers;
	}

	/**
	 * Method to retrieve the project terms.
	 * @return array(Term) terms
	 */
	public function get_terms()
	{
		return $this->terms;
	}

	/**
	 * Method to change the project terms.
	 * @param array(Term) $terms
	 * @throws InvalidArgumentException
	 */
	public function set_terms($terms)
	{
		if (is_null($terms)) {
			throw  new  InvalidArgumentException("Project Terms Invalid!");
		}
		$this->terms = $terms;
	}

	/**
	 * Method to retrieve the project members.
	 * @return array(User) members
	 */
	public function get_members()
	{
		return $this->members;
	}

	/**
	 * Method to change the project members.
	 * @param array(User) $members
	 * @throws InvalidArgumentException
	 */
	public function set_members($members)
	{
		if (is_null($members)) {
			throw  new  InvalidArgumentException("Project Members Invalid!");
		}

		$this->members = $members;
	}

	/**
	 * Method to retrieve the project quality scores.
	 * @return array(Quality_Score) quality_scores
	 */
	public function get_quality_scores()
	{
		return $this->quality_scores;
	}

	/**
	 * Method to change the project quality scores.
	 * @param array(Quality_Score) $quality_scores
	 * @throws InvalidArgumentException
	 */
	public function set_quality_scores($quality_scores)
	{
		if (is_null($quality_scores)) {
			throw  new  InvalidArgumentException("Quality Scores Invalid!");
		}
		$this->quality_scores = $quality_scores;
	}

}
