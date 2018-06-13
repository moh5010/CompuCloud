<?php
namespace OCA\OwnNotes\AppInfo;

use \OCP\AppFramework\App;
use \OCA\OwnNotes\Controller\PageController;
use \OCA\OwnNotes\Storage\AuthorStorage;

class Application extends App {
    public function __construct(array $urlParams=array()){
        parent::__construct('ownnotes', $urlParams);

        $container = $this->getContainer();
        $container->registerService('PageController', function($c) {
            return new PageController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('ServerContainer')->getURLGenerator()
            );
        });
        $container->registerService('AuthorStorage', function($c) {
            return new AuthorStorage($c->query('RootStorage'));
        });

        $container->registerService('RootStorage', function($c) {
            return $c->query('ServerContainer')->getRootFolder();
        });

    }
}
