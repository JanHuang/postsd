<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2017
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

$app = include __DIR__ . '/../../config/app.php';

$app['services'][] = \FastD\ServiceProvider\RouteServiceProvider::class;

return $app;
