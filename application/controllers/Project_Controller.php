<?php
class Project_Controller extends CI_Controller
{

	public function index(){
	}

	public function open($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project', $data);
		}
	}

	public function edit($id){
		$data['project'] = $id;
		load_templates('pages/project/project_edit',$data);
	}

	public function add_research($id){
		$data['project'] = $id;
		load_templates('pages/project/project_add_research',$data);
	}

	public function planning($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_planning_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project_planning', $data);
		}
	}

	public function conducting($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_conducting_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project_conducting', $data);
		}
	}

	public function reporting($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_reporting_visitor',$data);
		}else {
		$data['project'] = $id;
		load_templates('pages/project/project_reporting',$data);
		}
	}

	public function study_selection($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_study_selection_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project_study_selection', $data);
		}
	}

	public function quality_assessement($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_quality_assessement_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project_quality_assessement', $data);
		}
	}

	public function data_extraction($id){
		if(!isset($_SESSION['logged_in'])){
			$data['project'] = $id;
			load_templates('pages/visitor/project_data_extraction_visitor',$data);
		}else {
			$data['project'] = $id;
			load_templates('pages/project/project_data_extraction', $data);
		}
	}

	public function new_project(){
		load_templates('pages/project/project_new',null);
	}
}
