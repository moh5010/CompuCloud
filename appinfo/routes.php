<?php

namespace OCA\ownnotes\AppInfo;

$application = new Application();
$application->registerRoutes($this, [
    'routes' => [
        ['name' => 'page#index','url' => '/', 'verb' => 'GET'],
	      ['name' => 'computer#index', 'url' => '/computers', 'verb' => 'GET'],
        ['name' => 'mobile#index', 'url' => '/mobiles', 'verb' => 'GET'],
    ]
]);
