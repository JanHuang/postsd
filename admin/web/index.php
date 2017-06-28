<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

include __DIR__ . '/../../vendor/autoload.php';

use FastD\Application;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE,GET,POST,OPTIONS,PATCH,PUT');
$app = new Application(__DIR__ . '/..');

$app->run();
