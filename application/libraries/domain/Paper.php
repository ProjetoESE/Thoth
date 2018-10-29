<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent the Paper;
 */
class Paper
{

	private $title;
	private $author;
	private $abstract;
	private $year;
	private $keywords;
	private $document_type;
	private $publication_type;
	private $publisher;
	private $journal;
	private $pages;
	private $volume;
	private $doi;
	private $url;
	private $affiliation;
	private $issn;
	private $language;
	private $note;
	private $bibtex_key;
	private $added_by;
	private $updated_by;
	private $added_at;
	private $updated_at;
	private $database;
	private $status_selection;
	private $status_extraction;
	private $reding_priority;
	private $score;
	private $quality_score;

	/**
	 * Paper constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Paper constructor for data in database.
	 * @param String $title
	 * @param String $author
	 * @param String $abstract
	 * @param int $year
	 * @param String $keywords
	 * @param String $document_type
	 * @param String $publication_type
	 * @param String $publisher
	 * @param String $journal
	 * @param int $pages
	 * @param int $volume
	 * @param String $doi
	 * @param String $url
	 * @param String $affiliation
	 * @param String $issn
	 * @param String $language
	 * @param String $note
	 * @param String $bibtex_key
	 * @param User $added_by
	 * @param User $updated_by
	 * @param DateTime $added_at
	 * @param DateTime $updated_at
	 * @param Database $database
	 * @param Status_Selection_Type $status_selection
	 * @param Status_Extraction_Type $status_extraction
	 * @param Reading_Priority_Type $reding_priority
	 * @param float $score
	 * @param Quality_Score $quality_score
	 */
	public function __construct_DB($title, $author, $abstract, $year, $keywords, $document_type, $publication_type,
								   $publisher, $journal, $pages, $volume, $doi, $url, $affiliation, $issn, $language,
								   $note, $bibtex_key, $added_by, $updated_by, $added_at, $updated_at, $database,
								   $status_selection, $status_extraction, $reding_priority, $score, $quality_score)
	{
		$this->title = $title;
		$this->author = $author;
		$this->abstract = $abstract;
		$this->year = $year;
		$this->keywords = $keywords;
		$this->document_type = $document_type;
		$this->publication_type = $publication_type;
		$this->publisher = $publisher;
		$this->journal = $journal;
		$this->pages = $pages;
		$this->volume = $volume;
		$this->doi = $doi;
		$this->url = $url;
		$this->affiliation = $affiliation;
		$this->issn = $issn;
		$this->language = $language;
		$this->note = $note;
		$this->bibtex_key = $bibtex_key;
		$this->added_by = $added_by;
		$this->updated_by = $updated_by;
		$this->added_at = $added_at;
		$this->updated_at = $updated_at;
		$this->database = $database;
		$this->status_selection = $status_selection;
		$this->status_extraction = $status_extraction;
		$this->reding_priority = $reding_priority;
		$this->score = $score;
		$this->quality_score = $quality_score;
	}


	/**
	 * Paper constructor for new registry.
	 * @param String $title
	 * @param String $author
	 * @param String $abstract
	 * @param int $year
	 * @param String $keywords
	 * @param String $document_type
	 * @param String $publication_type
	 * @param String $publisher
	 * @param String $journal
	 * @param int $pages
	 * @param int $volume
	 * @param String $doi
	 * @param String $url
	 * @param String $affiliation
	 * @param String $issn
	 * @param String $language
	 *
	 */
	public function __construct_New($title, $author, $abstract, $year, $keywords, $document_type, $publication_type,
									$publisher, $journal, $pages, $volume, $doi, $url, $affiliation, $issn, $language)
	{
		$this->title = $title;
		$this->author = $author;
		$this->abstract = $abstract;
		$this->year = $year;
		$this->keywords = $keywords;
		$this->document_type = $document_type;
		$this->publication_type = $publication_type;
		$this->publisher = $publisher;
		$this->journal = $journal;
		$this->pages = $pages;
		$this->volume = $volume;
		$this->doi = $doi;
		$this->url = $url;
		$this->affiliation = $affiliation;
		$this->issn = $issn;
		$this->language = $language;
		$this->note = null;
		$this->bibtex_key = null;
		$this->added_by = null;
		$this->updated_by = null;
		$this->added_at = null;
		$this->updated_at = null;
		$this->database = null;
		$this->status_selection = null;
		$this->status_extraction = null;
		$this->reding_priority = null;
		$this->score = null;
		$this->quality_score = null;
	}


	/**
	 * Method to retrieve the paper note.
	 * @return String note
	 */
	public function getNote()
	{
		return $this->note;
	}

	/**
	 * Method to change the paper note.
	 * @param String $note
	 * @throws InvalidArgumentException
	 */
	public function setNote($note)
	{
		if (is_null($note) || empty($note)) {
			throw  new  InvalidArgumentException("Paper Note Invalid!");
		}
		$this->note = $note;
	}

	/**
	 * Method to retrieve the paper bibtex key.
	 * @return String bibitex_key
	 */
	public function getBibtexKey()
	{
		return $this->bibtex_key;
	}

	/**
	 * Method to change the paper bibtex key.
	 * @param String $bibtex_key
	 * @throws InvalidArgumentException
	 */
	public function setBibtexKey($bibtex_key)
	{
		if (is_null($bibtex_key) || empty($bibtex_key)) {
			throw  new  InvalidArgumentException("Paper Bibtex Key Invalid!");
		}
		$this->bibtex_key = $bibtex_key;
	}

	/**
	 * Method to retrieve the paper added by.
	 * @return User added_by
	 */
	public function getAddedBy()
	{
		return $this->added_by;
	}

	/**
	 * Method to change the paper added by.
	 * @param String $added_by
	 * @throws InvalidArgumentException
	 */
	public function setAddedBy($added_by)
	{
		if (is_null($added_by)) {
			throw  new  InvalidArgumentException("Paper Added By Invalid!");
		}
		$this->added_by = $added_by;
	}

	/**
	 * Method to retrieve the paper update by.
	 * @return User update_by
	 */
	public function getUpdatedBy()
	{
		return $this->updated_by;
	}

	/**
	 * Method to change the paper update by.
	 * @param String $updated_by
	 * @throws InvalidArgumentException
	 */
	public function setUpdatedBy($updated_by)
	{
		if (is_null($updated_by)) {
			throw  new  InvalidArgumentException("Paper Updated By Invalid!");
		}
		$this->updated_by = $updated_by;
	}

	/**
	 * Method to retrieve the paper added at.
	 * @return DateTime added_at
	 */
	public function getAddedAt()
	{
		return $this->added_at;
	}

	/**
	 * Method to change the paper added at.
	 * @param DateTime $added_at
	 * @throws InvalidArgumentException
	 */
	public function setAddedAt($added_at)
	{
		if (is_null($added_at)) {
			throw  new  InvalidArgumentException("Paper Added At Invalid!");
		}
		$this->added_at = $added_at;
	}

	/**
	 * Method to retrieve the paper updated at.
	 * @return DateTime updated_at
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	/**
	 * Method to change the paper updated at.
	 * @param DateTime $updated_at
	 * @throws InvalidArgumentException
	 */
	public function setUpdatedAt($updated_at)
	{
		if (is_null($updated_at)) {
			throw  new  InvalidArgumentException("Paper Updated At Invalid!");
		}
		$this->updated_at = $updated_at;
	}

	/**
	 * Method to retrieve the paper database.
	 * @return Database database
	 */
	public function getDatabase()
	{
		return $this->database;
	}

	/**
	 * Method to change the paper database.
	 * @param Database $database
	 * @throws InvalidArgumentException
	 */
	public function setDatabase($database)
	{
		if (is_null($database)) {
			throw  new  InvalidArgumentException("Paper Database Invalid!");
		}
		$this->database = $database;
	}

	/**
	 * Method to retrieve the paper status selection.
	 * @return Status_Selection_Type status_selection
	 */
	public function getStatusSelection()
	{
		return $this->status_selection;
	}

	/**
	 * Method to change the paper status selection.
	 * @param Status_Selection_Type $status_selection
	 * @throws InvalidArgumentException
	 */
	public function setStatusSelection($status_selection)
	{
		if (is_null($status_selection)) {
			throw  new  InvalidArgumentException("Paper Status Selection Invalid!");
		}
		$this->status_selection = $status_selection;
	}

	/**
	 * Method to retrieve the paper status extraction.
	 * @return Status_Extraction_Type status_extraction
	 */
	public function getStatusExtraction()
	{
		return $this->status_extraction;
	}

	/**
	 * Method to change the paper status extraction.
	 * @param Status_Extraction_Type $status_extraction
	 * @throws InvalidArgumentException
	 */
	public function setStatusExtraction($status_extraction)
	{
		if (is_null($status_extraction)) {
			throw  new  InvalidArgumentException("Paper Status Extraction Invalid!");
		}
		$this->status_extraction = $status_extraction;
	}

	/**
	 * Method to retrieve the paper reading priority.
	 * @return Reading_Priority_Type reading_priority
	 */
	public function getRedingPriority()
	{
		return $this->reding_priority;
	}

	/**
	 * Method to change the paper reading priority.
	 * @param Reading_Priority_Type $reding_priority
	 * @throws InvalidArgumentException
	 */
	public function setRedingPriority($reding_priority)
	{
		if (is_null($reding_priority)) {
			throw  new  InvalidArgumentException("Paper Reading Priority Invalid!");
		}
		$this->reding_priority = $reding_priority;
	}

	/**
	 * Method to retrieve the paper title.
	 * @return String title
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Method to retrieve the paper author.
	 * @return String author
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Method to retrieve the paper abstract.
	 * @return String abstract
	 */
	public function getAbstract()
	{
		return $this->abstract;
	}

	/**
	 * Method to retrieve the paper year.
	 * @return int year
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Method to retrieve the paper Keywords.
	 * @return String keywords
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}

	/**
	 * Method to retrieve the paper document type.
	 * @return String document_type
	 */
	public function getDocumentType()
	{
		return $this->document_type;
	}

	/**
	 * Method to retrieve the paper publication type.
	 * @return String publication_type
	 */
	public function getPublicationType()
	{

		return $this->publication_type;
	}

	/**
	 * Method to retrieve the paper publisher.
	 * @return String publisher
	 */
	public function getPublisher()
	{
		return $this->publisher;
	}

	/**
	 * Method to retrieve the paper journal.
	 * @return String journal
	 */
	public function getJournal()
	{
		return $this->journal;
	}

	/**
	 * Method to retrieve the paper pages.
	 * @return int pages
	 */
	public function getPages()
	{
		return $this->pages;
	}

	/**
	 * Method to retrieve the paper volume.
	 * @return int volume
	 */
	public function getVolume()
	{
		return $this->volume;
	}

	/**
	 * Method to retrieve the paper doi.
	 * @return String doi
	 */
	public function getDoi()
	{
		return $this->doi;
	}

	/**
	 * Method to retrieve the paper url.
	 * @return String url
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Method to retrieve the paper affiliation.
	 * @return String affiliation
	 */
	public function getAffiliation()
	{
		return $this->affiliation;
	}

	/**
	 * Method to retrieve the paper issn.
	 * @return int issn
	 */
	public function getIssn()
	{
		return $this->issn;
	}

	/**
	 * Method to retrieve the paper language.
	 * @return String language
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * Method to retrieve the paper score.
	 * @return float url
	 */
	public function getScore()
	{
		return $this->score;
	}

	/**
	 * Method to change the paper  score.
	 * @param float $score
	 * @throws InvalidArgumentException
	 */
	public function setScore($score)
	{
		if (is_null($score) || !is_float($score)) {
			throw  new  InvalidArgumentException("Paper Score Invalid!");
		}
		$this->score = $score;
	}

	/**
	 * Method to retrieve the paper quality score.
	 * @return Quality_Score quality_score
	 */
	public function getQualityScore()
	{
		return $this->quality_score;
	}

	/**
	 * Method to change the paper quality score.
	 * @param Quality_Score $quality_score
	 * @throws InvalidArgumentException
	 */
	public function setQualityScore($quality_score)
	{
		if (is_null($quality_score)) {
			throw  new  InvalidArgumentException("Paper Quality Score Invalid!");
		}
		$this->quality_score = $quality_score;
	}


}

