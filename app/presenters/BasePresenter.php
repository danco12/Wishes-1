<?php

namespace App\Presenters;

use Nette,
	Nette\Localization\ITranslator,
	Kdyby\Translation\TemplateHelpers,
	Latte\Engine,
	App\Model,
	Symfony\Component\Translation\Translator,
	Symfony\Component\Translation\MessageSelector,
	Symfony\Component\Translation\Loader\ArrayLoader;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	/** @var \Kdyby\Translation\Translator @inject */
    public $translator;

    /**
	* @var \App\Model\UserManager
	* @inject
	*/
	public $users;

	/**
	* @var \App\Model\Arrays
	* @inject
	*/
	public $arrays;

	/**
	* @var \App\Model\Wishes
	* @inject
	*/
	public $wishes;


	
	public function startup(){
		parent::startup();

		if(filemtime("../www/css/style.less") > filemtime("../www/css/style.css")) {
			include_once(__DIR__ .'/../../vendor/others/lessc.inc.php');
			$less = new \lessc;
			$less->compileFile("../www/css/style.less", "../www/css/style.css");
		}
		
		if (isset($_COOKIE["lang"]))
			$this->translator->setLocale($_COOKIE["lang"]);
		else $this->translator->getDefaultLocale();
			//$this->translator->setLocale("en");
	}

	public function handleChangeLanguage($l){
		setcookie("lang", $l, time() + (86400 * 9999999), "/");
		$this->redirect('this');
	}

}
