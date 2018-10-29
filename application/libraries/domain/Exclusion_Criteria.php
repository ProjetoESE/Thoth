<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent the Exclusion Criteria;
 */
class Exclusion_Criteria
{

	private $id;
	private $description;
	private $pre_selected;

	/**
	 * Exclusion Criteria constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Exclusion Criteria constructor for data in the database and new registry.
	 * @param String $id
	 * @param String $description
	 * @param boolean $pre_selected
	 */
	public function __construct_New_DB($id, $description, $pre_selected)
	{
		$this->id = $id;
		$this->description = $description;
		$this->pre_selected = $pre_selected;
	}

	/**
	 * Method to retrieve the criteria id.
	 * @return String id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Method to change the criteria id.
	 * @param String $id
	 * @throws InvalidArgumentException
	 */
	public function setId($id)
	{
		if (is_null($id) || empty($id)) {
			throw  new  InvalidArgumentException("Id Criteria Invalid!");
		}
		$this->id = $id;
	}

	/**
	 * Method to retrieve the criteria description.
	 * @return String description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Method to change the criteria description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Criteria Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the criteria preselected.
	 * @return boolean preselected
	 */
	public function getPreSelected()
	{
		return $this->pre_selected;
	}

	/**
	 * Method to change the criteria preselected.
	 * @param boolean $pre_selected
	 * @throws InvalidArgumentException
	 */
	public function setPreSelected($pre_selected)
	{
		if (is_null($pre_selected) || empty($pre_selected)) {
			throw  new  InvalidArgumentException("Criteria Preselected Invalid!");
		}
		$this->pre_selected = $pre_selected;
	}
}
