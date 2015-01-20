<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	private $userInfo;

	public function startup(){
		parent::startup();
		$this->userInfo = $this->users->byId($this->user->id)->fetch();
		if(!$this->user->isLoggedIn()) $this->redirect("Sign:in");
		else{
			if ($this->userInfo->name == ""){
				$this->flashMessage($this->translator->translate("messages.flashes.firstsettings"));
				$this->redirect("Settings:");
			}
			else{
				$this->template->userDetails = $this->userInfo;
				$this->template->name = $this->userInfo->name." ".$this->userInfo->surname;
			}
		
		}
	}

}
