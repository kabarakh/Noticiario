<?php

class DataSource {

	protected $articleList = array();

	protected $temporaryArticleList = array();

	protected $fileContents;

	public function generateArticleList() {
		$this->readFile();

		$currentLineNumber = 0;
		$this->temporaryArticleList[$currentLineNumber]['articleText'] = '';
		foreach ($this->fileContents as $lineNumber => $lineInFile) {
			$lineInFile = trim($lineInFile);

			if ($lineInFile === '----') {
				$currentLineNumber = $lineNumber;
				$this->temporaryArticleList[$currentLineNumber]['articleText'] = '';
			} elseif (substr($lineInFile, 0, 5) === 'date:') {
				$subparts = explode(':', $lineInFile);
				$this->temporaryArticleList[$currentLineNumber][$subparts[0]] = $this->formatDate($subparts[1]);
			} elseif (substr($lineInFile, 0, 6) === 'title:') {
				$subparts = explode(':', $lineInFile);
				$this->temporaryArticleList[$currentLineNumber][$subparts[0]] = trim($subparts[1]);
			} else {
				$this->temporaryArticleList[$currentLineNumber]['articleText'] .= ' '.$lineInFile;
			}

		}

		foreach ($this->temporaryArticleList as $singleArticleArray) {
			$this->articleList[] = new Article($singleArticleArray);
		}

		return $this->articleList;
	}

	protected function readFile() {
		$dataFilePath = NOTICIARIO_RUN_DIR.'dataFile.txt';

		if (!file_exists($dataFilePath)) {
			throw new Exception('File '.$dataFilePath. ' not found', 1363811295);
		}

		$this->fileContents = file($dataFilePath);

		if (!count($this->fileContents)) {
			throw new Exception('File '.$dataFilePath. 'is empty' , 1363811972);
		}
	}

	protected function formatDate($dateString, $targetFormat = 'DD/MM/YYYY') {
		$dateString = trim($dateString);

		if (!preg_match('/^\d{8}$/', $dateString)) {
			throw new Exception("Date format was not YYYYMMMDD in data file", 1363814406);
		}
		$year = substr($dateString, 0, 4);
		$month = substr($dateString, 4, 2);
		$day = substr($dateString, 6, 2);

		$targetString = $targetFormat;

		$targetString = str_replace('YYYY', $year, $targetString);
		$targetString = str_replace('MM', $month, $targetString);
		$targetString = str_replace('DD', $day, $targetString);

		return $targetString;
	}

}

?>