<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('/', 'MainPages:home');
        $router->addRoute('/main', 'MainPages:home');
        $router->addRoute('/home', 'MainPages:home');
        $router->addRoute('/about', 'MainPages:about');
        $router->addRoute('/contacts', 'MainPages:contacts');
        $router->addRoute('/news', 'News:show');
        $router->addRoute('/sign', 'Sign:in');
        $router->addRoute('/signout', 'Sign:out');
		return $router;
	}
}
