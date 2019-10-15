<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Score Quality;
*/

class Score_Quality
{
	private $score_rule;
	private $score;
	private $description;

	/**
	 * Score_Quality constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the score quality score rule.
	 * @return string score_rule
	 */
	public function get_score_rule()
	{
		return $this->score_rule;
	}

	/**
	 * Method to change the score quality score rule.
	 * @param string $score_rule
	 * @throws InvalidArgumentException
	 */
	public function set_score_rule($score_rule)
	{
		if (is_null($score_rule)) {
			throw  new  InvalidArgumentException("Score Quality Score Rule Invalid!");
		}
		$this->score_rule = $score_rule;
	}

	/**
	 * Method to retrieve the score quality score.
	 * @return int description
	 */
	public function get_score()
	{
		return $this->score;
	}

	/**
	 * Method to change the score quality score.
	 * @param int $score
	 * @throws InvalidArgumentException
	 */
	public function set_score($score)
	{
		if (is_null($score)) {
			throw  new  InvalidArgumentException("Score Quality Score Invalid!");
		}
		$this->score = $score;
	}

	/**
	 * Method to retrieve the score quality description.
	 * @return string description
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the score quality description.
	 * @param string $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description) || empty($description)) {
			throw  new  InvalidArgumentException("Score Quality Description Invalid!");
		}
		$this->description = $description;
	}

}
