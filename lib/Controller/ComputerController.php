<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Controller;

 use OCA\OwnNotes\Db\Computer;
 use OCA\OwnNotes\Db\ComputerMapper;
 use OCA\OwnNotes\Storage\AuthorStorage;

 class ComputerController extends Controller {

     private $mapper;
     private $userId;
     private $storage;

     public function __construct($AppName, IRequest $request, ComputerMapper $mapper, $UserId){
         parent::__construct($AppName, $request);

         $this->mapper = $mapper;
         $this->userId = $UserId;
     }
     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function index() {
         $coms = $this->mapper->findAll();
         return new TemplateResponse('ownnotes', 'computers', array("computers" => $coms));
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function add($computer_name, $computer_model, $computer_cpu, $computer_ram, $computer_hard, $computer_price, $computer_image) {
       $computer = new Computer();

       $computer->setComputerCompany($computer_name);
       $computer->setComputerModel($computer_model);
       $computer->setCpu($computer_cpu);
       $computer->setRam($computer_ram);
       $computer->setHardCapacity($computer_hard);
       $computer->setPrice($computer_price);
       $computer->setImage($computer_image);
       $id = $this->mapper->insert($computer);

       return new TemplateResponse('ownnotes', 'computers', array('id' => $id ));
     }

 }
