<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Controller;

 class PageController extends Controller {

     public function __construct($AppName, IRequest $request){
         parent::__construct($AppName, $request);
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function index() {
         // Renders ownnotes/templates/main.php
         return new TemplateResponse('ownnotes', 'main');
     }

 }
