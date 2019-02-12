<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Term;
*/

class Term
{

	private $description;
	private $synonymus = array();

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
	 * Method to retrieve the term synonymus.
	 * @return array(String) synonymus
	 */
	public function get_synonymus()
	{
		return $this->synonymus;
	}

	/**
	 * Method to change the term synonymus.
	 * @param array(String) $synonymus
	 * @throws InvalidArgumentException
	 */
	public function set_synonymus($synonymus)
	{
		if (is_null($synonymus)) {
			throw  new  InvalidArgumentException("Term Synonymus Invalid!");
		}
		array_push($this->synonymus, $synonymus);
	}

}
