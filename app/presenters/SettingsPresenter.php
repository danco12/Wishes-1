<?php

namespace App\Presenters;

use Nette,
	Nette\Utils\Image,
	App\Model;

class SettingsPresenter extends BasePresenter{

	private $userInfo;

	public function startup(){
		parent::startup();
		$this->userInfo = $this->users->byId($this->user->id)->fetch();
		$this->template->image = $this->userInfo->profile_image;
		//echo $this->userInfo->profile_image; exit;
		// $this->template->name = $this->userInfo->name." ".$this->userInfo->surname;
	}

	protected function createComponentSettingsForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('name', $this->translator->translate('messages.settings.name'))
			->setRequired($this->translator->translate('messages.settings.promptname'));

		$form->addText('surname', $this->translator->translate('messages.settings.surname'))
			->setRequired($this->translator->translate('messages.settings.promptsurname'));

		$form->addSelect('state',$this->translator->translate('messages.settings.state'),$this->arrays->countries)
			->setPrompt($this->translator->translate('messages.settings.promptstate'))
			->setRequired($this->translator->translate('messages.settings.promptstate'));

		$form->addText('date', $this->translator->translate('messages.settings.birthdate'))
			->setAttribute("class","datepicker");

		/*$form->addSelect('birth_year', $this->translator->translate('messages.settings.birthdate'))
			->setItems(range((int)(date('Y')-15),1900), FALSE)
			->setPrompt($this->translator->translate('messages.settings.year'))
			->setRequired($this->translator->translate('messages.settings.year'));

		$months = array(
				1 => $this->translator->translate('messages.months.jan'),
				2 => $this->translator->translate('messages.months.feb'),
				3 => $this->translator->translate('messages.months.mar'),
				4 => $this->translator->translate('messages.months.apr'),
				5 => $this->translator->translate('messages.months.maj'),
				6 => $this->translator->translate('messages.months.jun'),
				7 => $this->translator->translate('messages.months.jul'),
				8 => $this->translator->translate('messages.months.aug'),
				9 => $this->translator->translate('messages.months.sep'),
				10 => $this->translator->translate('messages.months.okt'),
				11 => $this->translator->translate('messages.months.nov'),
				12 => $this->translator->translate('messages.months.dec')
			);

		$form->addSelect('birth_month', ' ', $months)
			->setPrompt($this->translator->translate('messages.settings.month'))
			->setRequired($this->translator->translate('messages.settings.month'));

		$form->addSelect('birth_day', ' ')
			->setItems(range(1,31), FALSE)
			->setPrompt($this->translator->translate('messages.settings.day'))
			->setRequired($this->translator->translate('messages.settings.day'));
		*/
		$sex = array(
		    'm' => 'muž',
		    'f' => 'žena',
		);
		$form->addSelect('sex', $this->translator->translate('messages.settings.sex'), $sex)
			->setPrompt($this->translator->translate('messages.settings.promptsex'))
			->setRequired($this->translator->translate('messages.settings.promptsex'));

		$form->addUpload('image',$this->translator->translate('messages.settings.profileimage'))
			->setAttribute("onchange","readURL(this);");

		$form->addSubmit('send', $this->translator->translate('messages.settings.save'))
			->setAttribute("class","btn button-green col s12 m12 l12");

		$form->onSuccess[] = $this->settingsFormSucceeded;
		if ($this->userInfo->name != ""){
			$datum = explode('.',$this->userInfo->birthdate);
			$form->setDefaults(array(
				"name" => $this->userInfo->name,
				"surname" => $this->userInfo->surname,
				"state" => $this->userInfo->state,
				"birth_year" => $datum[2],
				"birth_month" => $datum[1],
				"birth_day" => $datum[0],
				"date" => $this->userInfo->birthdate,
				"sex" => $this->userInfo->sex
			));
		}
		
		return $form;
	}

	public function settingsFormSucceeded($form, $values)
	{	
		try {
			$this->users->update($this->userInfo->id, array(
														"name"=>$values->name,
														"surname"=>$values->surname,
														"state"=>$values->state,
														"sex"=>$values->sex,
														"birthdate" => $values->date//$values->birth_day.".".$values->birth_month.".".$values->birth_year,
														));
			if (isset($_COOKIE["lang"])) $this->users->update($this->user->id,array("language"=>$_COOKIE["lang"]));

			//////////////img upload
				$file = $values->image;
				$image = Image::fromFile($file);
				$hash = hash("gost",$values->image->name.date("now"));
		        if ($file->isOk()) {
		            $path = getcwd()."/images/upload/profile/".$hash.'.png';
		        	$image->save($path, 100, Image::PNG);
		        	$this->users->update($this->user->id, array("profile_image" => $hash));
		        }		        
		    ///////////img upload end

			$this->redirect('Profile:');

		} catch (Nette\Security\AuthenticationException $e) {
			$this->flashMessage($e->getMessage());
		}

	}
}