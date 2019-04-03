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
	 * Method to retrieve the quality score start interval.
	 * @return float start_interval
	 */
	public function get_start_interval()
	{
		return $this->start_interval;
	}

	/**
	 * Method to change the quality score start interval.
	 * @param float $start_interval
	 * @throws InvalidArgumentException
	 */
	public function set_start_interval($start_interval)
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
	public function get_end_interval()
	{
		return $this->end_interval;
	}

	/**
	 * Method to change the quality score end interval.
	 * @param float $end_interval
	 * @throws InvalidArgumentException
	 */
	public function set_end_interval($end_interval)
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
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * Method to change the quality score description.
	 * @param String $description
	 * @throws InvalidArgumentException
	 */
	public function set_description($description)
	{
		if (is_null($description)) {
			throw  new  InvalidArgumentException("Quality Score Description Invalid!");
		}
		$this->description = $description;
	}

}
