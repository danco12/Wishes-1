<?php

namespace App\Presenters;

use Nette,
	Nette\Application\UI\Form,
	App\Model;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{

	public function actionIn(){
		if($this->user->isLoggedIn())
			$this->redirect("Homepage:");
	}

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */

	public function beforeRenderSignIn(){
	}

	protected function createComponentSignInForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('username', $this->translator->translate('messages.sign.email'))
			->setAttribute('autocomplete', 'off')
			->setAttribute("onfocus", "$(this).removeAttr('readonly');")
			->setRequired('Please enter your username.');

		$form->addPassword('password', $this->translator->translate('messages.sign.pass'))
			->setAttribute('autocomplete', 'off')
			->setRequired('Please enter your password.');

		$form->addSubmit('send', $this->translator->translate('messages.sign.signin'));

		$form->onSuccess[] = $this->signInFormSucceeded;
		return $form;
	}

	public function signInFormSucceeded($form, $values)
	{
			$this->getUser()->setExpiration('14 days', FALSE);
		try {
			$this->getUser()->login($values->username, $values->password);
			$this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
			$this->flashMessage($e->getMessage());
		}

	}

	public function createComponentSignUpForm()
	{
		$form = new Nette\Application\UI\Form;
		$form->addText('email', $this->translator->translate('messages.sign.email'))
			->setAttribute('class', 'form-control')
			->setRequired('Please enter your email.');

		$form->addPassword('password', $this->translator->translate('messages.sign.pass'))
			->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaků.', 8)
			->setAttribute('class', 'form-control')
			->setRequired('Please enter your password.');

		$form->addCheckbox('agree',$this->translator->translate('messages.sign.agreewith').'<a href="#modal1">'.$this->translator->translate('messages.sign.conditions').'</a>')
    		->addRule(Form::EQUAL, $this->translator->translate('messages.sign.agreewitherror'), TRUE);

		$form->addSubmit('send', $this->translator->translate('messages.sign.signup'))
			->setAttribute("class","btn");

		$form->onValidate[] = $this->signUpOnValidate;

		$form->onSuccess[] = $this->signUpFormSucceeded;
		return $form;
	}

	public function signUpOnValidate($form){
		$values = $form->getValues();
			if ($this->users->byEmail($values->email)->count() > 0){
				$this->flashMessage($this->translator->translate('messages.flashes.emailexist'));
				$form->addError($this->translator->translate('messages.flashes.emailexist'));
			}
	}

	public function signUpFormSucceeded($form, $values)
	{
			$this->getUser()->setExpiration('14 days', FALSE);
		try {
			$this->users->add($values->email,$values->password);
			$this->getUser()->login($values->email, $values->password);
			$this->redirect('Settings:');

		} catch (Nette\Security\AuthenticationException $e) {
			$this->flashMessage($e->getMessage());
		}

	}

	public function actionOut()
	{
		$this->getUser()->logout();
		$this->redirect("Homepage:");
	}

}
