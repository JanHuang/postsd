<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2017
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Admin\Services;


use FastD\Container\Container;
use FastD\Container\ServiceProviderInterface;
use FastD\Routing\RouteCollection;
use FastD\Routing\RouteDispatcher;


class Router implements ServiceProviderInterface
{
    /**
     * @param Container $container
     * @return mixed
     */
    public function register(Container $container)
    {
        $router = new RouteCollection();
        $dispatcher = new RouteDispatcher($router, $container['config']->get('middleware', []));

        $container->add('router', $router);
        $container->add('dispatcher', $dispatcher);

        include app()->getPath().'/config/routes.php';
    }
}