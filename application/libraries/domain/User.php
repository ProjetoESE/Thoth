<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Class to represent the User;
*/

class User
{

	private $name;
	private $email;
	private $password;
	private $level;
	private $institution;
	private $lattes_link;

	/**
	 * User constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Method to retrieve the term name.
	 * @return String name
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * Method to change the user name
	 * @param String $name
	 * @throws InvalidArgumentException
	 */
	public function set_name($name)
	{
		if (is_null($name) || empty($name)) {
			throw  new  InvalidArgumentException("User Name Invalid!");
		}
		$this->name = $name;
	}

	/**
	 * Method to retrieve the user email.
	 * @return String email
	 */
	public function get_email()
	{
		return $this->email;
	}

	/**
	 * Method to change the user email.
	 * @param String $email
	 * @throws InvalidArgumentException
	 */
	public function set_email($email)
	{
		if (is_null($email) || empty($email)) {
			throw  new  InvalidArgumentException("User E-mail Invalid!");
		}
		$this->email = $email;
	}

	/**
	 * Method to retrieve the user password.
	 * @return String password
	 */
	public function get_password()
	{
		return $this->password;
	}

	/**
	 * Method to change the user email.
	 * @param String $password
	 * @throws InvalidArgumentException
	 */
	public function set_password($password)
	{
		if (is_null($password) || empty($password)) {
			throw  new  InvalidArgumentException("User Password Invalid!");
		}
		$this->password = $password;
	}

	/**
	 * Method to retrieve the user status.
	 * @return String level
	 */
	public function get_level()
	{
		return $this->level;
	}

	/**
	 * Method to change the user status.
	 * @param String $level
	 * @throws InvalidArgumentException
	 */
	public function set_level($level)
	{
		if (is_null($level) || empty($level)) {
			throw  new  InvalidArgumentException("User Status Invalid!");
		}
		$this->level = $level;
	}

	/**
	 * Method to retrieve the user institution.
	 * @return String institution
	 */
	public function get_institution()
	{
		return $this->institution;
	}

	/**
	 * Method to change the user institution.
	 * @param String $institution
	 * @throws InvalidArgumentException
	 */
	public function set_institution($institution)
	{
		if (is_null($institution) || empty($institution)) {
			throw  new  InvalidArgumentException("User Institution Invalid!");
		}
		$this->institution = $institution;
	}

	/**
	 * Method to retrieve the user lattes link.
	 * @return String lattes_link
	 */
	public function get_lattes_link()
	{
		return $this->lattes_link;
	}

	/**
	 * Method to change the user lattes link.
	 * @param String $lattes_link
	 * @throws InvalidArgumentException
	 */
	public function set_lattes_link($lattes_link)
	{
		if (is_null($lattes_link) || empty($lattes_link)) {
			throw  new  InvalidArgumentException("User Lattes Link Invalid!");
		}
		$this->lattes_link = $lattes_link;
	}

}
