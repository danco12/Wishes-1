<?php

namespace App\Model;

use Nette;


/**
 * Wishes model.
 */
class Wishes extends Nette\Object
{
	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getAll(){
		return $this->database->table('wishes');
	}

	public function allFromUser($id){
		return $this->getAll()->where('user_id', $id);
	}
}