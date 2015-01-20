<?php

namespace App\Model;

use Nette,
	Nette\Utils\Strings,
	Nette\Http,
	Nette\Security\Passwords;


/**
 * Users management.
 */
class UserManager extends Nette\Object implements Nette\Security\IAuthenticator
{
	const
		TABLE_NAME = 'users',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'username',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_ROLE = 'role';


	/** @var Nette\Database\Context */
	private $database;

	/** @var \Kdyby\Translation\Translator */
    protected $translator;


	public function __construct(Nette\Database\Context $database, \Kdyby\Translation\Translator $translator)
	{
		$this->database = $database;
		$this->translator = $translator;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

		$row = $this->database->table(self::TABLE_NAME)->where("email", $username)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException($this->translator->translate('messages.flashes.incorectname'), self::IDENTITY_NOT_FOUND);

		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException( $this->translator->translate('messages.flashes.incorectpass'), self::INVALID_CREDENTIAL);

		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update(array(
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
	 * @param  string
	 * @return void
	 */
	public function add($username, $password)
	{
		$this->database->table(self::TABLE_NAME)->insert(array(
			"email" => $username,
			self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
		));
	}

	public function update($id, $array){
		$this->database->table("users")->where("id",$id)->update($array);
	}

	public function getAll() {
		return $this->database->table("users");
	}

	public function byId($id) {
		return self::getAll()->where('id', $id);
	}

	public function byEmail($email) {
		return self::getAll()->where('email', $email);
	}

	public function isOwner($id){
		return $this->user->id == $id ? true:false;
	}

	public function getFriends($id = null){
		if($id)
			return $this->database->table("friends")->where("user_id",$id);
		else
			return $this->database->table("friends");
		
	}

}
