<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Question Quality;
*/

class Question_Quality
{

	private $weight;
	private $min_to_approve = null;
	private $scores = array();
	private $id;
	private $description;

	/**
	 * Question_Quality constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the question quality weight.
	 * @return float weight
	 */
	public function get_weight()
	{
		return $this->weight;
	}

	/**
	 * Method to change the question quality weight.
	 * @param float $weight
	 * @throws InvalidArgumentException
	 */
	public function set_weight($weight)
	{
		if (is_null($weight) || empty($weight)) {
			throw  new  InvalidArgumentException("Question Quality Weight Invalid!");
		}
		$this->weight = $weight;
	}

	/**
	 * Method to retrieve the question quality min to approve.
	 * @return Score_Rule min_to_approve
	 */
	public function get_min_to_approve()
	{
		return $this->min_to_approve;
	}

	/**
	 * Method to change the question quality min to approve.
	 * @param Score_Rule $min_to_approve
	 * @throws InvalidArgumentException
	 */
	public function set_min_to_approve($min_to_approve)
	{
		$this->min_to_approve = $min_to_approve;
	}

	/**
	 * Method to retrieve the question quality scores.
	 * @return array(Score_Rule) scores
	 */
	public function get_scores()
	{
		return $this->scores;
	}

	/**
	 * Method to change the question quality scores.
	 * @param Score_Rule $scores
	 * @throws InvalidArgumentException
	 */
	public function set_scores($scores)
	{
		if (is_null($scores) || empty($scores)) {
			throw  new  InvalidArgumentException("Question Quality Scores Invalid!");
		}
		array_push($this->scores, $scores);
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
