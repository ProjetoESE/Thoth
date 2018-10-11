<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Class to represent the Question Extraction;
*/
class Question_Extraction extends Question{

  private $options;
  private $type;

	/**
	 * Question_Extraction constructor for data in the database and new registry.
	 * @param $options
	 * @param $type
	 */
	public function __construct($id, $description ,$options, $type){
		Question::__construct($id, $description);
		$this->options = $options;
		$this->type = $type;
	}

	/**
	 * Method to retrieve the question extraction options.
	 * @return array(String) options
	 */
	public function getOptions(){
		return $this->options;
	}

	/**
	 * Method to change the question extraction options.
	 * @param array(String) $options
	 * @throws InvalidArgumentException
	 */
	public function setOptions($options){
		if(is_null($options) || empty($options)){
			throw  new  InvalidArgumentException("Question Extraction Options Invalid!");
		}
		$this->options = $options;
	}

	/**
	 * Method to retrieve the question extraction type.
	 * @return Question_Extraction_Type type
	 */
	public function getType(){
		return $this->type;
	}

	/**
	 * Method to change the question extraction type.
	 * @param Question_Extraction_Type $type
	 * @throws InvalidArgumentException
	 */
	public function setType($type){
		if(is_null($type)){
			throw  new  InvalidArgumentException("Question Extraction Type Invalid!");
		}
		$this->type = $type;
	}


}
