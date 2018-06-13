<?php

namespace OCA\ownnotes\AppInfo;

$application = new Application();
$application->registerRoutes($this, [
    'routes' => [
        ['name' => 'page#index','url' => '/', 'verb' => 'GET'],
	      ['name' => 'computer#index', 'url' => '/computers', 'verb' => 'GET'],
        ['name' => 'computer#add', 'url' => '/computers', 'verb' => 'POST'],
        ['name' => 'computer#buy', 'url' => '/computers/buy/{id}', 'verb' => 'GET'],
        ['name' => 'computer#search', 'url' => '/computers/search', 'verb' => 'GET'],
        ['name' => 'mobile#index', 'url' => '/mobiles', 'verb' => 'GET'],
    ]
]);
