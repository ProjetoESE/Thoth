<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the Quality Score;
*/

class Quality_Score
{

	private $start_interval;
	private $end_interval;
	private $description;

	/**
	 * Quality_Score constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Quality_Score constructor for data in the database and new registry.
	 * @param float $start_interval
	 * @param float $end_interval
	 * @param String $description
	 */
	public function __construct_New_DB($start_interval, $end_interval, $description)
	{
		$this->start_interval = $start_interval;
		$this->end_interval = $end_interval;
		$this->description = $description;
	}

	/**
	 * Method to retrieve the quality score start interval.
	 * @return float start_interval
	 */
	public function getStartInterval()
	{
		return $this->start_interval;
	}

	/**
	 * Method to change the quality score start interval.
	 * @param float $start_interval
	 * @throws InvalidArgumentException
	 */
	public function setStartInterval($start_interval)
	{
		if (is_null($start_interval)) {
			throw  new  InvalidArgumentException("Quality Score Start Interval Invalid!");
		}
		$this->start_interval = $start_interval;
	}

	/**
	 * Method to retrieve the quality score end interval.
	 * @return float end_interval
	 */
	public function getEndInterval()
	{
		return $this->end_interval;
	}

	/**
	 * Method to change the quality score end interval.
	 * @param float $end_interval
	 * @throws InvalidArgumentException
	 */
	public function setEndInterval($end_interval)
	{
		if (is_null($end_interval)) {
			throw  new  InvalidArgumentException("Quality Score End Interval Invalid!");
		}
		$this->end_interval = $end_interval;
	}

	/**
	 * Method to retrieve the quality score description.
	 * @return String description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Method to change the quality score description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function setDescription($description)
	{
		if (is_null($description)) {
			throw  new  InvalidArgumentException("Quality Score Description Invalid!");
		}
		$this->description = $description;
	}

}
