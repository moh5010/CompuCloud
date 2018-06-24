<?php
  namespace OCA\OwnNotes\Controller;

  use OCP\IRequest;
  use OCP\AppFramework\Http\DataResponse;
  use OCP\AppFramework\ApiController;

  use OCA\OwnNotes\Db\ComputerMapper;

  /**
   *
   */
  class ComputerApiController extends ApiController
  {
    private $userId;
    private $mapper;

    public function __construct($AppName, IRequest $request,ComputerMapper $mapper, $userId)
    {
      parent::__construct($AppName, $request);
      $this->mapper = $mapper;
      $this->userId = $UserId;
    }

    private function serializeComputers($coms) {
      $computers = [];
      foreach ($coms as $com) {
        $computer = [
          "computer_company" => $com->getComputerCompany(),
          "computer_model" => $com->getComputerModel(),
          "computer_ram" => $com->getRam(),
          "computer_cpu" => $com->getCpu(),
          "computer_hard" => $com->getHardCapacity(),
          "computer_price" => $com->getPrice()
        ];
        array_push($computers, $computer);
      }
      return $computers;

    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     */
     public function index() {
       $coms = $this->mapper->findAll();
       $coms = $this->serializeComputers($coms);
       return new DataResponse($coms);
     }

     /**
      * @CORS
      * @NoCSRFRequired
      * @NoAdminRequired
      */
      public function soldToday() {
        $coms = $this->mapper->getSoldToday();
        $coms = $this->serializeComputers($coms);
        return new DataResponse($coms);
      }
  }

 ?>
