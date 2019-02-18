<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Term;
*/

class Term
{

	private $description;
	private $synonyms = array();

	/**
	 * Term constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the term description.
	 * @return String description
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the term description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Term Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the term synonyms.
	 * @return array(String) synonyms
	 */
	public function get_synonyms()
	{
		return $this->synonyms;
	}

	/**
	 * Method to change the term synonyms.
	 * @param array(String) $synonyms
	 * @throws InvalidArgumentException
	 */
	public function set_synonyms($synonyms)
	{
		if (is_null($synonyms)) {
			throw  new  InvalidArgumentException("Term Synonyms Invalid!");
		}
		array_push($this->synonyms, $synonyms);
	}

}
