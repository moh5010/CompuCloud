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
        ['name' => 'computer#stats', 'url' => '/computers/stats', 'verb' => 'GET'],
        ['name' => 'mobile#index', 'url' => '/mobiles', 'verb' => 'GET'],
        ['name' => 'computer_api#index', 'url' => '/api/computers', 'verb' => 'GET'],
        ['name' => 'computer_api#soldToday', 'url' => '/api/computers/sold', 'verb' => 'GET'],
        ['name' => 'computer_api#preflighted_cors', 'url' => '/api/{path}',
        'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']]
    ]
]);
