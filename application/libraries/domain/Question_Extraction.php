<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Question Extraction;
*/

class Question_Extraction
{

	private $id;
	private $description;
	private $options;
	private $type;

	/**
	 * Question_Extraction constructor .
	 */
	public function __construct()
	{
	}

	/**
	 * Question_Extraction constructor for data in the database and new registry.
	 * @param $options
	 * @param $type
	 * @param $description
	 * @param $id
	 *
	 */
	public function __construct_New_DB($id, $description, $options, $type)
	{
		Question::__construct($id, $description);
		$this->options = $options;
		$this->type = $type;
	}

	/**
	 * Method to retrieve the question extraction options.
	 * @return array(String) options
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * Method to change the question extraction options.
	 * @param array(String) $options
	 * @throws InvalidArgumentException
	 */
	public function setOptions($options)
	{
		if (is_null($options) || empty($options)) {
			throw  new  InvalidArgumentException("Question Extraction Options Invalid!");
		}
		$this->options = $options;
	}

	/**
	 * Method to retrieve the question extraction type.
	 * @return Question_Extraction_Type type
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Method to change the question extraction type.
	 * @param Question_Extraction_Type $type
	 * @throws InvalidArgumentException
	 */
	public function setType($type)
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
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Method to change the question id.
	 * @param String $id
	 * @throws InvalidArgumentException
	 */
	public function setId($id)
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
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Method to change the question description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Question Description Invalid!");
		}
		$this->description = $description;
	}
}
