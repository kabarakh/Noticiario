<?php

class Article {

	protected $date;

	protected $title;

	protected $articleText;

	public function __construct($dataArray) {
		if (count($dataArray) !== 3) {
			throw new Exception('Expected array with three elements, but wasn\'t given', 1363806919);
		}

		if (!array_diff(array_keys($dataArray), array('date', 'title', 'articleText')) && !array_diff(array('date', 'title', 'articleText'), $dataArray)) {
			throw new Exception('Array provided doesn\'t have the proper properties', 1363808432);
		}

		$this->date = $dataArray['date'];
		$this->title = $dataArray['title'];
		$this->articleText = $dataArray['articleText'];
	}

	/**
	 * Getter for the date property
	 *
	 * @return string
	 */
	public function getDate() {
	    return $this->date;
	}
	
	/**
	 * Setter for the date property
	 *
	 * @param string $date
	 */
	public function setDate($date) {
	    $this->date = $date;
	}

	/**
	 * Getter for the title property
	 *
	 * @return string
	 */
	public function getTitle() {
	    return $this->title;
	}
	
	/**
	 * Setter for the title property
	 *
	 * @param String $title 
	 */
	public function setTitle($title) {
	    $this->title = $title;
	}

	/**
	 * Getter for the articleText property
	 *
	 * @return string
	 */
	public function getArticleText() {
	    return $this->articleText;
	}
	
	/**
	 * Setter for the articleText property
	 *
	 * @param String $articleText 
	 */
	public function setArticleText($articleText) {
	    $this->articleText = $articleText;
	}

}

?>