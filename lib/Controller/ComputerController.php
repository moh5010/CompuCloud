<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use \OCP\IURLGenerator;
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

     public function __construct($AppName, IRequest $request, ComputerMapper $mapper, IURLGenerator $urlGenerator, $UserId){
         parent::__construct($AppName, $request);

         $this->mapper = $mapper;
         $this->userId = $UserId;
         $this->urlGenerator = $urlGenerator;
     }
     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function index($message, $warn) {
        $coms = $this->mapper->findAll();
        $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
        return new TemplateResponse('ownnotes', 'computers', array("computers" => $coms, "message" => $message, "warn" => $warn, "url" => $url));
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function add($computer_name, $computer_model, $computer_cpu, $computer_ram, $computer_hard, $computer_price, $computer_image) {
       $computer = new Computer();

       $computer->setComputerCompany(strtolower($computer_name));
       $computer->setComputerModel($computer_model);
       $computer->setCpu($computer_cpu);
       $computer->setRam($computer_ram);
       $computer->setHardCapacity($computer_hard);
       $computer->setPrice($computer_price);
       $computer->setImage($computer_image);
       $computer->setSold(False);
       $id = $this->mapper->insert($computer);

       $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index", array("message" => "Computer added"));
       return new RedirectResponse($url);
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function buy($id) {
         $computers = $this->mapper->findById($id);
         if (count($computers) == 0) {
          $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
          return new RedirectResponse($url);
         }
         $computer = $computers[0];
         if ($computer->getSold() == true) {
           if ($this->userId == $computer->getUserId()) {
            $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index", array("message" => "Computer Already yours", "warn" => "true"));
            return new RedirectResponse($url);
           }
           else {
            $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index", array("message" => "Computer Already sold", "warn" => "true"));
            return new RedirectResponse($url);
           }

         }
         $computer->setUserId($this->userId);
         $computer->setSold(true);
         $this->mapper->update($computer);
         $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index", array("message" => "You bought this computer"));
         return new RedirectResponse($url);
     }
     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function search($filter_sold, $company_name) {
       $url = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
       $coms = $this->mapper->filterComs($filter_sold, strtolower($company_name));
       return new TemplateResponse('ownnotes', 'computers', array("computers" => $coms, "message" => $message, "url" => $url));
     }

 }
