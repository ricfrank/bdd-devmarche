<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

return ConsoleRunner::createHelperSet($app['em']);