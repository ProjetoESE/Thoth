<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Question Quality;
*/
class Question_Quality extends Question{

  private $weight;
  private $min_to_approve;
  private $scores;

	/**
	 * Question_Quality constructor for data in the database and new registry.
	 * @param String $id
	 * @param String $description
	 * @param float $weight
	 * @param Score_Rule $min_to_approve
	 * @param array(Score_Rule) $scores
	 */
	public function __construct($id, $description, $weight, $min_to_approve, $scores){
		Question::__construct($id,$description);
		$this->weight = $weight;
		$this->min_to_approve = $min_to_approve;
		$this->scores = $scores;
	}

	/**
	 * Method to retrieve the question quality weight.
	 * @return float weight
	 */
	public function getWeight(){
		return $this->weight;
	}

	/**
	 * Method to change the question quality weight.
	 * @param float $weight
	 * @throws InvalidArgumentException
	 */
	public function setWeight($weight){
		if(is_null($weight) || empty($weight)){
			throw  new  InvalidArgumentException("Question Quality Weight Invalid!");
		}
		$this->weight = $weight;
	}

	/**
	 * Method to retrieve the question quality min to approve.
	 * @return Score_Rule min_to_approve
	 */
	public function getMinToApprove(){
		return $this->min_to_approve;
	}

	/**
	 * Method to change the question quality min to approve.
	 * @param Score_Rule $min_to_approve
	 * @throws InvalidArgumentException
	 */
	public function setMinToApprove($min_to_approve){
		if(is_null($min_to_approve)){
			throw  new  InvalidArgumentException("Question Quality Minimum To Approve Invalid!");
		}
		$this->min_to_approve = $min_to_approve;
	}

	/**
	 * Method to retrieve the question quality scores.
	 * @return array(Score_Rule) scores
	 */
	public function getScores()
	{
		return $this->scores;
	}

	/**
	 * Method to change the question quality scores.
	 * @param Score_Rule $scores
	 * @throws InvalidArgumentException
	 */
	public function setScores($scores){
		if(is_null($scores) || empty($scores)){
			throw  new  InvalidArgumentException("Question Quality Scores Invalid!");
		}
		$this->scores = $scores;
	}

}
