<?php

use Nette\Application\Routers\Route,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\SimpleRouter;

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../vendor/others')
	->addDirectory(__DIR__ . '/../vendor/Kdyby')
	->addDirectory(__DIR__ . '/../vendor/Symphony')
	->addDirectory(__DIR__ . '/../vendor/Config-master')
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
if ($configurator->detectDebugMode('production')){
	$configurator->addConfig(__DIR__ . '/config/config.local.neon');
}

$container = $configurator->createContainer();

return $container;
