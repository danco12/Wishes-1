<?php

namespace App\Presenters;

use Nette,
	Nette\Utils\Image,
	App\Model;

class ProfilePresenter extends BasePresenter{

	private $userInfo;
	public $edit;

	public $id;
	
	private $wishess;

	public function startup($id = null){
		parent::startup();
		$this->userInfo = $this->users->byId($this->user->id)->fetch();
		if(!$this->user->isLoggedIn()) $this->redirect("Sign:in");
		else{
			if ($this->userInfo->name == ""){
				$this->flashMessage($this->translator->translate("messages.flashes.firstsettings"));
				$this->redirect("Settings:");
			}
		}
	}

	public function actionDefault($id = null){

		if(!$id){
			$this->wishess = $this->wishes->allFromUser($this->user->id);
			$this->template->userDetails = $this->userInfo = $this->users->byId($this->user->id)->fetch();
			$this->template->wishes = $this->wishess->order("position ASC");
			$this->template->friends = $this->users->getFriends()->where("user_id",$this->user->id);
		}
		else{

			$this->wishess = $this->wishes->allFromUser($id);
			$this->template->userDetails = $this->userInfo = $this->users->byId($id)->fetch();
			if(!$this->userInfo){
				$this->flashMessage("user neexist");
				$this->redirect("profile:");
			}
			$this->template->wishes = $this->wishess->order("position ASC");
			$this->template->friends = $this->users->getFriends()->where("user_id",$id);
		}
	}

	public function createComponentAddWishForm(){
		$form = new Nette\Application\UI\Form;


		$form->addText('name', $this->translator->translate('messages.profile.name'))
			->setRequired($this->translator->translate('messages.profile.promptname'));

		$form->addText('link', $this->translator->translate('messages.profile.link'));
			//->setRequired($this->translator->translate('messages.profile.promptlink'));

		$form->addUpload('image',$this->translator->translate('messages.profile.image'))
			->setAttribute("onchange","readURL(this);");

		$form->addSubmit('send', $this->translator->translate('messages.profile.save'))
			->setAttribute("class","btn button-green col s12 m12 l12");

		$form->onSuccess[] = $this->addWishFormSucceeded;

		return $form;
	}

	public function addWishFormSucceeded($form, $values)
	{
		$hash = "";
		//////////////img upload
			if ($values->image != ""){
				$file = $values->image;
				$image = Image::fromFile($file);
				$hash = hash("gost",$values->image->name.date("now"));
		        if ($file->isOk()) {
		            $path = getcwd()."/images/upload/wishes/".$hash.'.png';
		        	$image->save($path, 100, Image::PNG);
		        }
		    }
	    ///////////img upload end
		try{
		$this->wishes->getAll()->insert(array(
				"name" => $values->name,
				"link" => $values->link,
				"image" => $hash,
				"user_id" => $this->user->id
			));
		$this->redirect('Profile:');
		}catch (Nette\Security\AuthenticationException $e) {
			$this->flashMessage($e->getMessage());
		}
	}

	public function handleSaveOrder($array){
		$array = explode(',', $array);
		unset($array[0]);
		foreach ($array as $position=>$id) {
			$this->wishes->getAll()->where("id", $id)->update(array("position"=>$position));
		}
	}

	public function handleDeleteWish($delete_id){
		if($this->user->id == $this->userInfo->id && $this->user->isLoggedIn()){
			$this->wishes->getAll()->where('id',$delete_id)->delete();
			if($this->isAjax())
				$this->redrawControl('wishe');
		}else {
			$this->flashMessage("nemas opravnenie mazat");
			$this->redirect("this");
		}
	}

	// public function handleEditWish($id){
	// 	$this->edit = true;
	// 	if($this->isAjax())
	// 		$this->redrawControl("wish".$id);
	// }

	public function isFriend($friend_id){
		return $this->users->getFriends()->where(array("friend_id"=>$friend_id,"user_id"=>$this->user->id))->count();
	}

	public function handleAddFriend($friend_id){
		$this->users->getFriends()->insert(array(
				"user_id" => $this->user->id,
				"friend_id" => $friend_id
			));
		if($this->isAjax()){
				$this->redrawControl("profile");
			}
	}

	public function handleSortWishes($type){
		if(!$this->id){
			$wishess = $this->wishes->allFromUser($this->user->id);
		}
		else{
			$wishess = $this->wishes->allFromUser($this->id);
		}

		if($type == "date")
			$this->template->wishes = $wishess->order("created ASC");
		elseif($type == "price")
			$this->template->wishes = $wishess->order("price ASC");
		else 
			$this->template->wishes = $wishess->order("name ASC");

		if($this->isAjax())
			$this->redrawControl("wishe");
	}
}