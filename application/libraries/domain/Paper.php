<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent the Paper;
 */
class Paper
{

	private $id;
	private $title;
	private $author;
	private $abstract;
	private $year;
	private $keywords;
	private $type;
	private $publisher;
	private $journal;
	private $pages;
	private $num_pages;
	private $volume;
	private $doi;
	private $url;
	private $issn;
	private $address;
	private $location;
	private $isbn;
	private $note;
	private $book_title;
	private $bib_key;
	private $added_at;
	private $updated_at;
	private $database;
	private $status_selection;
	private $status_extraction;
	private $score;
	private $status_quality;
	private $rule_quality;

	/**
	 * Paper constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * @return mixed
	 */
	public function get_rule_quality()
	{
		return $this->rule_quality;
	}

	/**
	 * @param mixed $rule_quality
	 * @return Paper
	 */
	public function set_rule_quality($rule_quality)
	{
		$this->rule_quality = $rule_quality;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return Paper
	 */
	public function set_id($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_title()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 * @return Paper
	 */
	public function set_title($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_author()
	{
		return $this->author;
	}

	/**
	 * @param mixed $author
	 * @return Paper
	 */
	public function set_author($author)
	{
		$this->author = $author;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_abstract()
	{
		return $this->abstract;
	}

	/**
	 * @param mixed $abstract
	 * @return Paper
	 */
	public function set_abstract($abstract)
	{
		$this->abstract = $abstract;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_year()
	{
		return $this->year;
	}

	/**
	 * @param mixed $year
	 * @return Paper
	 */
	public function set_year($year)
	{
		$this->year = $year;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_keywords()
	{
		return $this->keywords;
	}

	/**
	 * @param mixed $keywords
	 * @return Paper
	 */
	public function set_keywords($keywords)
	{
		$this->keywords = $keywords;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_type()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 * @return Paper
	 */
	public function set_type($type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_publisher()
	{
		return $this->publisher;
	}

	/**
	 * @param mixed $publisher
	 * @return Paper
	 */
	public function set_publisher($publisher)
	{
		$this->publisher = $publisher;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_journal()
	{
		return $this->journal;
	}

	/**
	 * @param mixed $journal
	 * @return Paper
	 */
	public function set_journal($journal)
	{
		$this->journal = $journal;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_pages()
	{
		return $this->pages;
	}

	/**
	 * @param mixed $pages
	 * @return Paper
	 */
	public function set_pages($pages)
	{
		$this->pages = $pages;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_num_pages()
	{
		return $this->num_pages;
	}

	/**
	 * @param mixed $num_pages
	 * @return Paper
	 */
	public function set_num_pages($num_pages)
	{
		$this->num_pages = $num_pages;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_volume()
	{
		return $this->volume;
	}

	/**
	 * @param mixed $volume
	 * @return Paper
	 */
	public function set_volume($volume)
	{
		$this->volume = $volume;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_doi()
	{
		return $this->doi;
	}

	/**
	 * @param mixed $doi
	 * @return Paper
	 */
	public function set_doi($doi)
	{
		$this->doi = $doi;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_url()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 * @return Paper
	 */
	public function set_url($url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_issn()
	{
		return $this->issn;
	}

	/**
	 * @param mixed $issn
	 * @return Paper
	 */
	public function set_issn($issn)
	{
		$this->issn = $issn;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_address()
	{
		return $this->address;
	}

	/**
	 * @param mixed $address
	 * @return Paper
	 */
	public function set_address($address)
	{
		$this->address = $address;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_location()
	{
		return $this->location;
	}

	/**
	 * @param mixed $location
	 * @return Paper
	 */
	public function set_location($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_isbn()
	{
		return $this->isbn;
	}

	/**
	 * @param mixed $isbn
	 * @return Paper
	 */
	public function set_isbn($isbn)
	{
		$this->isbn = $isbn;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_note()
	{
		return $this->note;
	}

	/**
	 * @param mixed $note
	 * @return Paper
	 */
	public function set_note($note)
	{
		$this->note = $note;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_book_title()
	{
		return $this->book_title;
	}

	/**
	 * @param mixed $book_title
	 * @return Paper
	 */
	public function set_book_title($book_title)
	{
		$this->book_title = $book_title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_bib_key()
	{
		return $this->bib_key;
	}

	/**
	 * @param mixed $bib_key
	 * @return Paper
	 */
	public function set_bib_key($bib_key)
	{
		$this->bib_key = $bib_key;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_added_at()
	{
		return $this->added_at;
	}

	/**
	 * @param mixed $added_at
	 * @return Paper
	 */
	public function set_added_at($added_at)
	{
		$this->added_at = $added_at;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_updated_at()
	{
		return $this->updated_at;
	}

	/**
	 * @param mixed $updated_at
	 * @return Paper
	 */
	public function set_updated_at($updated_at)
	{
		$this->updated_at = $updated_at;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_database()
	{
		return $this->database;
	}

	/**
	 * @param mixed $database
	 * @return Paper
	 */
	public function set_database($database)
	{
		$this->database = $database;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_status_selection()
	{
		return $this->status_selection;
	}

	/**
	 * @param mixed $status_selection
	 * @return Paper
	 */
	public function set_status_selection($status_selection)
	{
		$this->status_selection = $status_selection;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_status_extraction()
	{
		return $this->status_extraction;
	}

	/**
	 * @param mixed $status_extraction
	 * @return Paper
	 */
	public function set_status_extraction($status_extraction)
	{
		$this->status_extraction = $status_extraction;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_score()
	{
		return $this->score;
	}

	/**
	 * @param mixed $score
	 * @return Paper
	 */
	public function set_score($score)
	{
		$this->score = $score;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function get_status_quality()
	{
		return $this->status_quality;
	}

	/**
	 * @param mixed $status_quality
	 * @return Paper
	 */
	public function set_status_quality($status_quality)
	{
		$this->status_quality = $status_quality;
		return $this;
	}


}

