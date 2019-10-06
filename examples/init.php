<?php

define('BASE_PATH', dirname(__DIR__));

require BASE_PATH . '/vendor/autoload.php';

/**
 * Fill in your api token and the examples in the /examples directory should work
 */
(\Dotenv\Dotenv::create(dirname(__DIR__)))->load();

$client = \ByTIC\eSignAnyWhere\ESignAnyWhereApi::create(getenv('API_ORGANIZATION_KEY'), getenv('API_USER'));