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
	private $status;
	private $institution;
	private $lattes_link;
	private $created_at;
	private $updated_at;

	/**
	 * User constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * User constructor for data in the database.
	 * @param String $name
	 * @param String $email
	 * @param String $password
	 * @param String $status
	 * @param String $institution
	 * @param String $lattes_link
	 * @param DateTime $created_at
	 * @param DateTime $updated_at
	 */
	public function __construct_DB($name, $email, $password, $status, $institution, $lattes_link, $created_at, $updated_at)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->status = $status;
		$this->institution = $institution;
		$this->lattes_link = $lattes_link;
		$this->created_at = $created_at;
		$this->updated_at = $updated_at;
	}

	/**
	 * User constructor for new registry.
	 * @param String $name
	 * @param String $email
	 * @param String $password
	 */
	public function __construct_New($name, $email, $password)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
		$this->status = null;
		$this->institution = null;
		$this->lattes_link = null;
		$this->created_at = null;
		$this->updated_at = null;
	}

	/**
	 * Method to retrieve the term name.
	 * @return String name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Method to change the user name
	 * @param String $name
	 * @throws InvalidArgumentException
	 */
	public function setName($name)
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
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Method to change the user email.
	 * @param String $email
	 * @throws InvalidArgumentException
	 */
	public function setEmail($email)
	{
		if (is_null($email) || empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw  new  InvalidArgumentException("User E-mail Invalid!");
		}
		$this->email = $email;
	}

	/**
	 * Method to retrieve the user password.
	 * @return String password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Method to change the user email.
	 * @param String $password
	 * @throws InvalidArgumentException
	 */
	public function setPassword($password)
	{
		if (is_null($password) || empty($password)) {
			throw  new  InvalidArgumentException("User Password Invalid!");
		}
		$this->password = $password;
	}

	/**
	 * Method to retrieve the user status.
	 * @return String status
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Method to change the user status.
	 * @param String $status
	 * @throws InvalidArgumentException
	 */
	public function setStatus($status)
	{
		if (is_null($status) || empty($status)) {
			throw  new  InvalidArgumentException("User Status Invalid!");
		}
		$this->status = $status;
	}

	/**
	 * Method to retrieve the user institution.
	 * @return String institution
	 */
	public function getInstitution()
	{
		return $this->institution;
	}

	/**
	 * Method to change the user institution.
	 * @param String $institution
	 * @throws InvalidArgumentException
	 */
	public function setInstitution($institution)
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
	public function getLattesLink()
	{
		return $this->lattes_link;
	}

	/**
	 * Method to change the user lattes link.
	 * @param String $lattes_link
	 * @throws InvalidArgumentException
	 */
	public function setLattesLink($lattes_link)
	{
		if (is_null($lattes_link) || empty($lattes_link)) {
			throw  new  InvalidArgumentException("User Lattes Link Invalid!");
		}
		$this->lattes_link = $lattes_link;
	}

	/**
	 * Method to retrieve the user created at.
	 * @return DateTime created_at
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * Method to change the user created at.
	 * @param DateTime $created_at
	 * @throws InvalidArgumentException
	 */
	public function setCreatedAt($created_at)
	{
		if (is_null($created_at)) {
			throw  new  InvalidArgumentException("User Created At Invalid!");
		}
		$this->created_at = $created_at;
	}

	/**
	 * Method to retrieve the user updated at.
	 * @return DateTime updated_at
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	/**
	 * Method to change the user updated at.
	 * @param DateTime $updated_at
	 * @throws InvalidArgumentException
	 */
	public function setUpdatedAt($updated_at)
	{
		if (is_null($updated_at)) {
			throw  new  InvalidArgumentException("User Updated At Invalid!");
		}
		$this->updated_at = $updated_at;
	}

}