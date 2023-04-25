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
		$router->addRoute('/', 'MainPages:home'); // <presenter>/<action>[/<id>]
		$router->addRoute('/home', 'MainPages:home');
		$router->addRoute('/main', 'MainPages:home');

		$router->addRoute('/about', 'MainPages:about');
		$router->addRoute('/news', 'News:articles');
        $router->addRoute('/login', 'Sign:in');
        $router->addRoute('/logout', 'Sign:out');

		return $router;
	}
}
