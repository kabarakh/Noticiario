<?php

class Noticiario {

	public function generateArticleList() {
		$this->definePathConstants();
		$this->requireClasses();

		$dataSource = new DataSource();
		$articleList = $dataSource->generateArticleList();

		$templateParser = new TemplateParser();
		$htmlContent = $templateParser->render($articleList);

		return $htmlContent;
	}

	protected function definePathConstants() {
		define('NOTICIARIO_RUN_DIR', realpath('.').'/');
		define('NOTICIARIO_ROOT_DIR', realpath(dirname(__FILE__)).'/');
		define('NOTICIARIO_CLASSES_DIR', NOTICIARIO_ROOT_DIR.'Classes/');
		define('NOTICIARIO_TEMPLATES_DIR', NOTICIARIO_ROOT_DIR.'Templates/');
	}

	protected function requireClasses() {

		require_once(NOTICIARIO_CLASSES_DIR.'DataSource.php');
		require_once(NOTICIARIO_CLASSES_DIR.'ArticleModel.php');
		require_once(NOTICIARIO_CLASSES_DIR.'TemplateParser.php');

	}
}

$noticiario = new Noticiario();

echo $noticiario->generateArticleList();

?>