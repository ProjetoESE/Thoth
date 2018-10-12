<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Project;
*/
class Project {

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
    private $domains;
    private $languages;
    private $study_types;
    private $keywords;
    private $research_questions;
    private $databases;
    private $search_strings;
    private $search_strategy;
    private $criterias_inclusion;
    private $criterias_exclusion;
    private $questions_quality;
    private $questions_extraction;
    private $papers;
    private $terms;
    private $members;
    private $quality_scores;

	/**
	 * Project constructor for data in the database.
	 * @param String $title
	 * @param String $description
	 * @param String $objectives
	 * @param User $created_by
	 * @param DateTime $start_date
	 * @param DateTime $end_date
	 * @param DateTime $has_date
	 * @param Rule_Type $inclusion_rule
	 * @param Rule_Type $exclusion_rule
	 * @param Quality_Score $score_min
	 * @param array(String) $domains
	 * @param array(String) $languages
	 * @param array(String) $study_types
	 * @param array(String) $keywords
	 * @param array(Research_Question) $research_questions
	 * @param array(Database) $databases
	 * @param array(Search_String) $search_strings
	 * @param String $search_strategy
	 * @param array(Inclusion_Criteria) $criterias_inclusion
	 * @param array(Exclusion_Criteria) $criterias_exclusion
	 * @param array(Quality_Question) $questions_quality
	 * @param array(Question_Extraction)$questions_extraction
	 * @param array(Paper) $papers
	 * @param array(Term) $terms
	 * @param array(User) $members
	 * @param array(Quality_Score) $quality_scores
	 */
	public function __construct($title, $description, $objectives, $created_by, $start_date, $end_date, $has_date, $inclusion_rule, $exclusion_rule, $score_min, $domains, $languages, $study_types, $keywords, $research_questions, $databases, $search_strings, $search_strategy, $criterias_inclusion, $criterias_exclusion, $questions_quality, $questions_extraction, $papers, $terms, $members, $quality_scores)
	{
		$this->title = $title;
		$this->description = $description;
		$this->objectives = $objectives;
		$this->created_by = $created_by;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->has_date = $has_date;
		$this->inclusion_rule = $inclusion_rule;
		$this->exclusion_rule = $exclusion_rule;
		$this->score_min = $score_min;
		$this->domains = $domains;
		$this->languages = $languages;
		$this->study_types = $study_types;
		$this->keywords = $keywords;
		$this->research_questions = $research_questions;
		$this->databases = $databases;
		$this->search_strings = $search_strings;
		$this->search_strategy = $search_strategy;
		$this->criterias_inclusion = $criterias_inclusion;
		$this->criterias_exclusion = $criterias_exclusion;
		$this->questions_quality = $questions_quality;
		$this->questions_extraction = $questions_extraction;
		$this->papers = $papers;
		$this->terms = $terms;
		$this->members = $members;
		$this->quality_scores = $quality_scores;
	}


	/**
	 * Project constructor for to new registry.
	 * @param String $title
	 * @param String $description
	 * @param String $objectives
	 * @param User $created_by
	 */
	public function __constructd($title, $description, $objectives, $created_by){
		$this->title = $title;
		$this->description = $description;
		$this->objectives = $objectives;
		$this->created_by = $created_by;
		$this->start_date = null;
		$this->end_date = null;
		$this->has_date = null;
		$this->inclusion_rule = null;
		$this->exclusion_rule = null;
		$this->score_min = null;
		$this->domains = null;
		$this->languages = null;
		$this->study_types = null;
		$this->keywords = null;
		$this->research_questions = null;
		$this->databases = null;
		$this->search_strings = null;
		$this->search_strategy = null;
		$this->criterias_inclusion = null;
		$this->criterias_exclusion = null;
		$this->questions_quality = null;
		$this->questions_extraction = null;
		$this->papers = null;
		$this->terms = null;
		$this->members = null;
		$this->quality_scores = null;
	}


	/**
	 * Method to retrieve the project title.
	 * @return String title
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 * Method to change the project title.
	 * @param String $title
	 * @throws InvalidArgumentException
	 */
	public function setTitle($title){
		if(is_null($title) || empty($title)){
			throw  new  InvalidArgumentException("Project Title Invalid!");
		}
		$this->title = $title;
	}

	/**
	 * Method to retrieve the project description.
	 * @return String description
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 * Method to change the project description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description){
		if(is_null($description) || empty($description)){
			throw  new  InvalidArgumentException("Project Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the project objectives.
	 * @return String objectives
	 */
	public function getObjectives(){
		return $this->objectives;
	}

	/**
	 * Method to change the project objectives.
	 * @param String $objectives
	 * @throws InvalidArgumentException
	 */
	public function setObjectives($objectives){
		if(is_null($objectives) || empty($objectives)){
			throw  new  InvalidArgumentException("Project Objectives Invalid!");
		}
		$this->objectives = $objectives;
	}

	/**
	 * Method to retrieve the project created by.
	 * @return User created_by
	 */
	public function getCreatedBy(){
		return $this->created_by;
	}

	/**
	 * Method to change the project created by.
	 * @param User $created_by
	 * @throws InvalidArgumentException
	 */
	public function setCreatedBy($created_by){
		if(is_null($created_by)){
			throw  new  InvalidArgumentException("Project Created By Invalid!");
		}
		$this->created_by = $created_by;
	}

	/**
	 * Method to retrieve the project start date.
	 * @return DateTime start_date
	 */
	public function getStartDate(){
		return $this->start_date;
	}

	/**
	 * Method to change the project start date.
	 * @param DateTime $start_date
	 * @throws InvalidArgumentException
	 */
	public function setStartDate($start_date){
		if(is_null($start_date)){
			throw  new  InvalidArgumentException("Project Start Date Invalid!");
		}
		$this->start_date = $start_date;
	}

	/**
	 * Method to retrieve the project end date.
	 * @return DateTime end_date
	 */
	public function getEndDate(){
		return $this->end_date;
	}

	/**
	 * Method to change the project end date.
	 * @param DateTime $end_date
	 * @throws InvalidArgumentException
	 */
	public function setEndDate($end_date){
		if(is_null($end_date)){
			throw  new  InvalidArgumentException("Project End Date Invalid!");
		}
		$this->end_date = $end_date;
	}

	/**
	 * Method to retrieve the project end date.
	 * @return DateTime has_date
	 */
	public function getHasDate()
	{
		return $this->has_date;
	}

	/**
	 * Method to change the project has date.
	 * @param DateTime $has_date
	 * @throws InvalidArgumentException
	 */
	public function setHasDate($has_date){
		if(is_null($has_date)){
			throw  new  InvalidArgumentException("Project Has Date Invalid!");
		}
		$this->has_date = $has_date;
	}

	/**
	 * Method to retrieve the project inclusion rule.
	 * @return Rule_Type inclusion_rule
	 */
	public function getInclusionRule()
	{
		return $this->inclusion_rule;
	}

	/**
	 * Method to change the project inclusion rule.
	 * @param Rule_Type $inclusion_rule
	 * @throws InvalidArgumentException
	 */
	public function setInclusionRule($inclusion_rule){
		if(is_null($inclusion_rule)){
			throw  new  InvalidArgumentException("Project Inclusion Rule Invalid!");
		}
		$this->inclusion_rule = $inclusion_rule;
	}

	/**
	 * Method to retrieve the project exclusion rule.
	 * @return Rule_Type exclusion_rule
	 */
	public function getExclusionRule(){
		return $this->exclusion_rule;
	}

	/**
	 * Method to change the project exclusion rule.
	 * @param Rule_Type $exclusion_rule
	 * @throws InvalidArgumentException
	 */
	public function setExclusionRule($exclusion_rule){
		if(is_null($exclusion_rule)){
			throw  new  InvalidArgumentException("Project Exclusion Rule Invalid!");
		}
		$this->exclusion_rule = $exclusion_rule;
	}

	/**
	 * Method to retrieve the project score min.
	 * @return Quality_Score score_min
	 */
	public function getScoreMin(){
		return $this->score_min;
	}

	/**
	 * Method to change the project score min.
	 * @param Quality_Score $score_min
	 * @throws InvalidArgumentException
	 */
	public function setScoreMin($score_min){
		if(is_null($score_min)){
			throw  new  InvalidArgumentException("Project Score Minimum Invalid!");
		}
		$this->score_min = $score_min;
	}

	/**
	 * Method to retrieve the project domains.
	 * @return array(String) domains
	 */
	public function getDomains(){
		return $this->domains;
	}

	/**
	 * Method to change the project domains.
	 * @param array(String) $domains
	 * @throws InvalidArgumentException
	 */
	public function setDomains($domains){
		if(is_null($domains) || empty($domains)){
			throw  new  InvalidArgumentException("Project Domains Invalid!");
		}
		$this->domains = $domains;
	}

	/**
	 * Method to retrieve the project languages.
	 * @return array(String) languages
	 */
	public function getLanguages(){
		return $this->languages;
	}

	/**
	 * Method to change the project languages.
	 * @param array(String) $languages
	 * @throws InvalidArgumentException
	 */
	public function setLanguages($languages){
		if(is_null($languages) || empty($languages)){
			throw  new  InvalidArgumentException("Project Languages Invalid!");
		}
		$this->languages = $languages;
	}

	/**
	 * Method to retrieve the project study types.
	 * @return array(String) study_types
	 */
	public function getStudyTypes(){
		return $this->study_types;
	}

	/**
	 * Method to change the project study types.
	 * @param array(String) $study_types
	 * @throws InvalidArgumentException
	 */
	public function setStudyTypes($study_types){
		if(is_null($study_types) || empty($study_types)){
			throw  new  InvalidArgumentException("Project Study Types Invalid!");
		}
		$this->study_types = $study_types;
	}

	/**
	 * Method to retrieve the project keywords.
	 * @return array(String) keywords
	 */
	public function getKeywords(){
		return $this->keywords;
	}

	/**
	 * Method to change the project keywords.
	 * @param array(String) $keywords
	 * @throws InvalidArgumentException
	 */
	public function setKeywords($keywords){
		if(is_null($keywords) || empty($keywords)){
			throw  new  InvalidArgumentException("Project Keywords Invalid!");
		}
		$this->keywords = $keywords;
	}

	/**
	 * Method to retrieve the project research questions.
	 * @return array(Research_Questions) research_questions
	 */
	public function getResearchQuestions(){
		return $this->research_questions;
	}

	/**
	 * Method to change the project research questions.
	 * @param array(Research_Questions) $research_questions
	 * @throws InvalidArgumentException
	 */
	public function setResearchQuestions($research_questions){
		if(is_null($research_questions) || empty($research_questions)){
			throw  new  InvalidArgumentException("Project Keywords Invalid!");
		}
		$this->research_questions = $research_questions;
	}

	/**
	 * Method to retrieve the project databases.
	 * @return array(Database) databases
	 */
	public function getDatabases(){
		return $this->databases;
	}

	/**
	 * Method to change the project databases.
	 * @param array(Database) $databases
	 * @throws InvalidArgumentException
	 */
	public function setDatabases($databases){
		if(is_null($databases) || empty($databases)){
			throw  new  InvalidArgumentException("Project Databases Invalid!");
		}
		$this->databases = $databases;
	}

	/**
	 * Method to retrieve the project search strings.
	 * @return array(Search_String) search_strings
	 */
	public function getSearchStrings()
	{
		return $this->search_strings;
	}

	/**
	 * Method to change the project search strings.
	 * @param array(Search_String) $search_strings
	 * @throws InvalidArgumentException
	 */
	public function setSearchStrings($search_strings){
		if(is_null($search_strings) || empty($search_strings)){
			throw  new  InvalidArgumentException("Project Search Strings Invalid!");
		}
		$this->search_strings = $search_strings;
	}

	/**
	 * Method to retrieve the project search strategy.
	 * @return String search_strategy
	 */
	public function getSearchStrategy(){
		return $this->search_strategy;
	}

	/**
	 * Method to change the project search strategy.
	 * @param String $search_strategy
	 * @throws InvalidArgumentException
	 */
	public function setSearchStrategy($search_strategy){
		if(is_null($search_strategy) || empty($search_strategy)){
			throw  new  InvalidArgumentException("Project Search Strategy Invalid!");
		}
		$this->search_strategy = $search_strategy;
	}

	/**
	 * Method to retrieve the project criterias inclusion.
	 * @return array(Inclusion_Criteria) criterias_inclusion
	 */
	public function getCriteriasInclusion()
	{
		return $this->criterias_inclusion;
	}

	/**
	 * Method to change the project criterias inclusion.
	 * @param array(Inclusion_Criteria) $criterias_inclusion
	 * @throws InvalidArgumentException
	 */
	public function setCriteriasInclusion($criterias_inclusion){
		if(is_null($criterias_inclusion) || empty($criterias_inclusion)){
			throw  new  InvalidArgumentException("Project Criterias Inclusion Invalid!");
		}
		$this->criterias_inclusion = $criterias_inclusion;
	}

	/**
	 * Method to retrieve the project criterias exclusion.
	 * @return array(Exclusion_Criteria) criterias_exclusion
	 */
	public function getCriteriasExclusion(){
		return $this->criterias_exclusion;
	}

	/**
	 * Method to change the project criterias exclusion.
	 * @param array(Exclusion_Criteria) $criterias_exclusion
	 * @throws InvalidArgumentException
	 */
	public function setCriteriasExclusion($criterias_exclusion){
		if(is_null($criterias_exclusion) || empty($criterias_exclusion)){
			throw  new  InvalidArgumentException("Project Criterias Exclusion Invalid!");
		}
		$this->criterias_exclusion = $criterias_exclusion;
	}

	/**
	 * Method to retrieve the project questions quality.
	 * @return array(Questions_Quality) questions_quality
	 */
	public function getQuestionsQuality(){
		return $this->questions_quality;
	}

	/**
	 * Method to change the project questions quality.
	 * @param array(Questions_Quality) $questions_quality
	 * @throws InvalidArgumentException
	 */
	public function setQuestionsQuality($questions_quality){
		if(is_null($questions_quality) || empty($questions_quality)){
			throw  new  InvalidArgumentException("Project Questions Quality Invalid!");
		}
		$this->questions_quality = $questions_quality;
	}

	/**
	 * Method to retrieve the project questions extraction.
	 * @return array(Questions_extraction) questions_extraction
	 */
	public function getQuestionsExtraction(){
		return $this->questions_extraction;
	}

	/**
	 * Method to change the project questions extraction.
	 * @param array(Questions_extraction) $questions_extraction
	 * @throws InvalidArgumentException
	 */
	public function setQuestionsExtraction($questions_extraction){
		if(is_null($questions_extraction) || empty($questions_extraction)){
			throw  new  InvalidArgumentException("Project Questions extraction Invalid!");
		}
		$this->questions_extraction = $questions_extraction;
	}

	/**
	 * Method to retrieve the project papers.
	 * @return array(Paper) papers
	 */
	public function getPapers(){
		return $this->papers;
	}

	/**
	 * Method to change the project papers.
	 * @param array(Paper) $papers
	 * @throws InvalidArgumentException
	 */
	public function setPapers($papers){
		if(is_null($papers) || empty($papers)){
			throw  new  InvalidArgumentException("Project Papers Invalid!");
		}
		$this->papers = $papers;
	}

	/**
	 * Method to retrieve the project terms.
	 * @return array(Term) terms
	 */
	public function getTerms(){
		return $this->terms;
	}

	/**
	 * Method to change the project terms.
	 * @param array(Term) $terms
	 * @throws InvalidArgumentException
	 */
	public function setTerms($terms){
		if(is_null($terms) || empty($terms)){
			throw  new  InvalidArgumentException("Project Terms Invalid!");
		}
		$this->terms = $terms;
	}

	/**
	 * Method to retrieve the project members.
	 * @return array(User) members
	 */
	public function getMembers(){
		return $this->members;
	}

	/**
	 * Method to change the project members.
	 * @param array(User) $members
	 * @throws InvalidArgumentException
	 */
	public function setMembers($members){
		if(is_null($members) || empty($members)){
			throw  new  InvalidArgumentException("Project Members Invalid!");
		}
		$this->members = $members;
	}

	/**
	 * Method to retrieve the project quality scores.
	 * @return array(Quality_Score) quality_scores
	 */
	public function getQualityScores(){
		return $this->quality_scores;
	}

	/**
	 * Method to change the project quality scores.
	 * @param array(Quality_Score) $quality_scores
	 * @throws InvalidArgumentException
	 */
	public function setQualityScores($quality_scores){
		if(is_null($quality_scores) || empty($quality_scores)){
			throw  new  InvalidArgumentException("Project Members Invalid!");
		}
		$this->quality_scores = $quality_scores;
	}

}
