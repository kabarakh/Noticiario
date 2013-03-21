<?php

class TemplateParser {

	protected $templateFileContents;

	protected $outputString = '';

	public function render($listOfArticles) {
		$this->prepareTemplate();

		foreach ($listOfArticles as $article) {
			$this->outputString .= $this->generateHtmlForArticle($article);
		}

		return $this->outputString;
	}

	protected function prepareTemplate() {
		$templatePath = NOTICIARIO_TEMPLATES_DIR.'ArticleList.html';
		if (!file_exists($templatePath)) {
			throw new Exception("Template file not existing", 1363814002);
		}
		$this->templateFileContents = file_get_contents($templatePath);
	}

	protected function generateHtmlForArticle($article) {
		$temporaryString = str_replace('{article.date}', $article->getDate(), $this->templateFileContents);
		$temporaryString = str_replace('{article.title}', $article->getTitle(), $this->templateFileContents);
		$temporaryString = str_replace('{article.articleText}', $article->getArticleText(), $this->templateFileContents);

		return $temporaryString;
	}

}

?>