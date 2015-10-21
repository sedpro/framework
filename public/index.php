<?php

require '../Framework/Autoloader.php';

Framework\Autoloader::register();

$config = require '../App/config/config.php';
$app = new Framework\App($config);

$app->run();