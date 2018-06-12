<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Http\RedirectResponse;
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
     public function index($message, $warn) {
         $coms = $this->mapper->findAll();
         return new TemplateResponse('ownnotes', 'computers', array("computers" => $coms, "message" => $message, "warn" => $warn));
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
       $computer->setSold(False);
       $id = $this->mapper->insert($computer);

       return new RedirectResponse("/apps/ownnotes/computers?message=Computer added");
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function buy($id) {
         $computers = $this->mapper->findById($id);
         if (count($computers) == 0) {
           return new RedirectResponse("/apps/ownnotes/computers");
         }
         $computer = $computers[0];
         if ($computer->getSold() == true) {
           return new RedirectResponse("/apps/ownnotes/computers?message=Computer Alread Sold&warn=true");
         }
         $computer->setUserId($this->userId);
         $computer->setSold(true);
         $this->mapper->update($computer);
         return new RedirectResponse("/apps/ownnotes/computers?message=You bought this computer");
     }

 }
