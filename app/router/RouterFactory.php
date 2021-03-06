<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();
		$router[] = new Route('index.php', 'Homepage:default', Route::ONE_WAY);
		$router[] = new Route('[<locale=sk sk|en>/]profile/<id>', "Profile:default");
		$router[] = new Route('[<locale=sk sk|en>/]<presenter>/<action>[/id]', "Homepage:default");

		
		return $router;
	}

}
