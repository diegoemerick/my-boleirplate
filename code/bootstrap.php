<?php

require('config.php');
require('core/autoload/autoload.php');

$autoloader = new Autoload();
spl_autoload_register([$autoloader, 'load']);

$router = new Router();