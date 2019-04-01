<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Question Extraction;
*/

class Question_Extraction
{

	private $id;
	private $description;
	private $options = array();
	private $type;

	/**
	 * Question_Extraction constructor .
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the question extraction options.
	 * @return array(String) options
	 */
	public function get_options()
	{
		return $this->options;
	}

	/**
	 * Method to change the question extraction options.
	 * @param array(String) $options
	 * @throws InvalidArgumentException
	 */
	public function set_options($options)
	{
		if (is_null($options) || empty($options)) {
			throw  new  InvalidArgumentException("Question Extraction Options Invalid!");
		}
		array_push($this->options, $options);
	}

	/**
	 * Method to retrieve the question extraction type.
	 * @return String type
	 */
	public function get_type()
	{
		return $this->type;
	}

	/**
	 * Method to change the question extraction type.
	 * @param String $type
	 * @throws InvalidArgumentException
	 */
	public function set_type($type)
	{
		if (is_null($type)) {
			throw  new  InvalidArgumentException("Question Extraction Type Invalid!");
		}
		$this->type = $type;
	}

	/**
	 * Method to retrieve the question id.
	 * @return String id
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * Method to change the question id.
	 * @param String $id
	 * @throws InvalidArgumentException
	 */
	public function set_id($id)
	{
		if (is_null($id) || empty($id)) {
			throw  new  InvalidArgumentException("Question Id Invalid!");
		}
		$this->id = $id;
	}

	/**
	 * Method to retrieve the question description.
	 * @return String description
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the question description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Question Description Invalid!");
		}
		$this->description = $description;
	}
}
