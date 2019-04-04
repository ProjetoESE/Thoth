<?php
/**
 * Error style
 */


$config = array(
	/**
	 * LOGIN REQUESTS
	 */
	'Login_Controller/log_into' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|max_length[255]|valid_email',
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|max_length[255]',
		)),

	'Login_Controller/log_up' => array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|max_length[255]|valid_mail|is_unique[user.email]',
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|max_length[255]',
		),
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[255]',
		)
	),


	/**
	 * CRITERIA REQUESTS
	 */
	'Criteria_Controller/edit_exclusion_rule' => array(
		array(
			'field' => 'rule',
			'label' => 'Exclusion Rule',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
	),

	'Criteria_Controller/edit_inclusion_rule' => array(
		array(
			'field' => 'rule',
			'label' => 'Inclusion Rule',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),

	),

	'Criteria_Controller/add_criteria' => array(
		array(
			'field' => 'id',
			'label' => 'Criteria ID',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'type',
			'label' => 'Criteria Type',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'description',
			'label' => 'Criteria Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Criteria_Controller/selected_pre_select' => array(
		array(
			'field' => 'id',
			'label' => 'ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
		array(
			'field' => 'pre_selected',
			'label' => 'Status',
			'rules' => 'trim|required|in_list[true,false]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Criteria_Controller/delete_criteria' => array(
		array(
			'field' => 'id',
			'label' => 'Criteria ID',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Criteria_Controller/edit_criteria' => array(
		array(
			'field' => 'old_id',
			'label' => 'Old Criteria ID',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'new_id',
			'label' => 'New Criteria ID',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'old',
			'label' => 'Old Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'description',
			'label' => 'Criteria Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'new_type',
			'label' => 'Criteria Type',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'pre_selected',
			'label' => 'Criteria Status',
			'rules' => 'trim|required|in_list[true,false]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),


	/**
	 * DATABASE REQUESTS
	 */
	'Database_Controller/add_database' => array(
		array(
			'field' => 'database',
			'label' => 'Database',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Database_Controller/delete_database' => array(
		array(
			'field' => 'database',
			'label' => 'Database',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Database_Controller/new_database' => array(
		array(
			'field' => 'database',
			'label' => 'Database',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'link',
			'label' => 'Database Link',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),



	/**
	 * OVERALL REQUEST
	 */
	'Overall_Model/delete_domain' => array(
		array(
			'field' => 'domain',
			'label' => 'Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/add_domain' => array(
		array(
			'field' => 'domain',
			'label' => 'Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/edit_domain' => array(
		array(
			'field' => 'now',
			'label' => 'New domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'old',
			'label' => 'Old Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/add_language' => array(
		array(
			'field' => 'language',
			'label' => 'Language',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/delete_language' => array(
		array(
			'field' => 'language',
			'label' => 'Language',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/add_study_type' => array(
		array(
			'field' => 'study_type',
			'label' => 'Study Type',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/delete_study_type' => array(
		array(
			'field' => 'study_type',
			'label' => 'Study Type',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/add_keywords' => array(
		array(
			'field' => 'keywords',
			'label' => 'Keywords',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/delete_keywords' => array(
		array(
			'field' => 'keywords',
			'label' => 'Keywords',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/edit_keywords' => array(
		array(
			'field' => 'now',
			'label' => 'New domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'old',
			'label' => 'Old Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Overall_Model/add_date' => array(
		array(
			'field' => 'start_date',
			'label' => 'Start Date',
			'rules' => 'required|regex_match[/[0-31]{2}/[0-12]{2}/[0-9]{4}/]',
		),
		array(
			'field' => 'end_date',
			'label' => 'End Date',
			'rules' => 'required|regex_match[/[0-31]{2}/[0-12]{2}/[0-9]{4}/]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),



	/**
	 * PROJECT REQUESTS
	 */

	'Project_Controller/created_project' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'objectives',
			'label' => 'Objectives',
			'rules' => 'trim|required|max_length[255]',
		)
	),

	'Project_Controller/edited_project' => array(
		array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'objectives',
			'label' => 'Objectives',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Project_Controller/add_member' => array(
		array(
			'field' => 'email',
			'label' => 'User Email',
			'rules' => 'trim|required|max_length[255]|valid_email',
		),
		array(
			'field' => 'level',
			'label' => 'User Level',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Project_Controller/deleted_project' => array(
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),


	/**
	 * QUALITY REQUESTS
	 * TODO: all
	 */
	'Quality_Controller/add_qa' => array(),
	'Quality_Controller/delete_qa' => array(),
	'Quality_Controller/add_score_quality' => array(),
	'Quality_Controller/edit_min_score_qa' => array(),
	'Quality_Controller/delete_score_quality' => array(),
	'Quality_Controller/edit_qa' => array(),
	'Quality_Controller/edit_score_quality' => array(),
	'Quality_Controller/add_general_quality_score' => array(),
	'Quality_Controller/delete_general_quality_score' => array(),
	'Quality_Controller/edit_general_score' => array(),
	'Quality_Controller/edit_min_score' => array(),


	/**
	 * EXTRACTION REQUESTS
	 * TODO: all
	 */
	'Extraction_Controller/add_question_extraction' => array(),
	'Extraction_Controller/add_option' => array(),
	'Extraction_Controller/delete_extraction' => array(),
	'Extraction_Controller/delete_option' => array(),
	'Extraction_Controller/edit_de' => array(),
	'Extraction_Controller/edit_option' => array(),


	/**
	 * RESEARCH REQUESTS
	 */
	'Research_Controller/add_research_question' => array(
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
		array(
			'field' => 'id_rq',
			'label' => 'Research Question ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Research_Controller/delete_research_question' => array(
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
		array(
			'field' => 'id_rq',
			'label' => 'Research Question ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Research_Controller/edit_research_question' => array(
		array(
			'field' => 'now_question',
			'label' => 'Description',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
		array(
			'field' => 'now_id',
			'label' => 'New Research Question ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		),
		array(
			'field' => 'old_id',
			'label' => 'Old Research Question ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),


	/**
	 * SEARCH STRING CONTROLLER
	 */
	'Search_String_Controller/add_term' => array(
		array(
			'field' => 'term',
			'label' => 'Term',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/delete_term' => array(
		array(
			'field' => 'term',
			'label' => 'Term',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/edit_term' => array(
		array(
			'field' => 'now',
			'label' => 'New domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'old',
			'label' => 'Old Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/add_synonym' => array(
		array(
			'field' => 'term',
			'label' => 'Term',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'syn',
			'label' => 'Synonym',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/delete_synonym' => array(
		array(
			'field' => 'term',
			'label' => 'Term',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'syn',
			'label' => 'Synonym',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/edit_synonym' => array(
		array(
			'field' => 'term',
			'label' => 'Term',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'now',
			'label' => 'New domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'old',
			'label' => 'Old Domain',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/generate_string' => array(
		array(
			'field' => 'database',
			'label' => 'Database',
			'rules' => 'trim|required|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),

	'Search_String_Controller/edit_search_strategy' => array(
		array(
			'field' => 'search_strategy',
			'label' => 'Search Strategy',
			'rules' => 'trim|max_length[255]',
		),
		array(
			'field' => 'id_project',
			'label' => 'Project ID',
			'rules' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[2147483647]',
		)
	),
);

$config['error_prefix'] = '';
$config['error_suffix'] = '<br/>';
