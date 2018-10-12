<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class to represent the Inclusion Criteria;
 */
class Inclusion_Criteria extends Criteria {

	/**
	 * Inclusion_Criteria constructor for data in the database and new registry.
	 * @param String $id
	 * @param String $description
	 * @param boolean $preselected
	 */
	public function __construct($id, $description, $preselected){
		Criteria::__construct($id, $description, $preselected);
	}
}
