<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent the Inclusion Criteria;
 */
class Inclusion_Criteria
{

	private $id;
	private $description;
	private $pre_selected;

	/**
	 * Inclusion Criteria constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the criteria id.
	 * @return String id
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * Method to change the criteria id.
	 * @param String $id
	 * @throws InvalidArgumentException
	 */
	public function set_id($id)
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
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the criteria description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
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
	public function get_pre_selected()
	{
		return $this->pre_selected;
	}

	/**
	 * Method to change the criteria preselected.
	 * @param boolean $pre_selected
	 * @throws InvalidArgumentException
	 */
	public function set_pre_selected($pre_selected)
	{
		if (is_null($pre_selected)) {
			throw  new  InvalidArgumentException("Criteria Preselected Invalid!");
		}
		$this->pre_selected = $pre_selected;
	}
}
