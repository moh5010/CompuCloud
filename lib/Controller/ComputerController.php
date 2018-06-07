<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Controller;

 class ComputerController extends Controller {

     public function __construct($AppName, IRequest $request){
         parent::__construct($AppName, $request);
     }
     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function index() {
         return new TemplateResponse('ownnotes', 'computers');
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function add($computer_name, $computer_model, $computer_cpu, $computer_ram, $computer_hard, $computer_price) {
       return $computer_price;
         //return new TemplateResponse('ownnotes', 'computers');
     }

 }
