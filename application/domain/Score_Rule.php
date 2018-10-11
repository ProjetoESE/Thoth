<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Score Rule;
*/
class Score_Rule{

  private $score;
  private $description;
  private $abbreviation;

	/**
	 * Score_Rule constructor for data in the database and new registry.
	 * @param float $score
	 * @param String $description
	 * @param String $abbreviation
	 */
	public function __construct($score, $description, $abbreviation){
		$this->score = $score;
		$this->description = $description;
		$this->abbreviation = $abbreviation;
	}

	/**
	 * Method to retrieve the score rule score.
	 * @return float score
	 */
	public function getScore(){
		return $this->score;
	}

	/**
	 * Method to change the score rule score.
	 * @param float $score
	 * @throws InvalidArgumentException
	 */
	public function setScore($score){
		if(is_null($score)){
			throw  new  InvalidArgumentException("Score Rule Score Invalid!");
		}
		$this->score = $score;
	}

	/**
	 * Method to retrieve the score rule description.
	 * @return String description
	 */
	public function getDescription(){
		return $this->description;
	}

	/**
	 * Method to change the score rule description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description){
		if(is_null($description) || empty($description)){
			throw  new  InvalidArgumentException("Score Rule Description Invalid!");
		}
		$this->description = $description;
	}

	/**
	 * Method to retrieve the score rule abbreviation.
	 * @return String abbreviation
	 */
	public function getAbbreviation(){
		return $this->abbreviation;
	}

	/**
	 * Method to change the score rule description.
	 * @param String $abbreviation
	 * @throws InvalidArgumentException
	 */
	public function setAbbreviation($abbreviation){
		if(is_null($abbreviation) || empty($abbreviation)){
			throw  new  InvalidArgumentException("Score Rule Description Invalid!");
		}
		$this->abbreviation = $abbreviation;
	}

}
