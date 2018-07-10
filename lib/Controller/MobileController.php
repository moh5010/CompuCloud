<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use \OCP\IURLGenerator;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Http\DataResponse;
 use OCP\AppFramework\Http\RedirectResponse;
 use OCP\AppFramework\Controller;

 use OCA\OwnNotes\Db\Mobile;
 use OCA\OwnNotes\Db\MobileMapper;

 class MobileController extends Controller {
   public function __construct($AppName, IRequest $request, MobileMapper $mapper, IURLGenerator $urlGenerator, $UserId){
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
     $mobiles = $this->mapper->findAll();

     $unsold = $this->mapper->findUnsold();
     $indexUrl = $this->urlGenerator->linkToRoute("ownnotes.page.index");
     $mobileUrl = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
     $mobileUrl = $this->urlGenerator->linkToRoute("ownnotes.mobile.index");
     //$statsUrl = $this->urlGenerator->linkToRoute("ownnotes.computer.stats");
     if (count($unsold) < 5) {
          $message = "Too little mobiles in database";
          $warn = true;
        }
        return new TemplateResponse('ownnotes', 'mobiles', array("mobiles" => $mobiles, "message" => $message, "warn" => $warn,
            "indexUrl" => $indexUrl, "statsUrl" => $statsUrl, "computerUrl" => $mobileUrl, "mobileUrl" => $mobileUrl));
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function add($mobile_name, $mobile_model, $mobile_cpu, $mobile_ram, $mobile_memory, $camera, $mobile_price, $mobile_image) {
       $mobile = new Mobile();

       $mobile->setMobileName($mobile_name);
       $mobile->setMobileModel(strtolower($mobile_model));
       $mobile->setMobileCpu($mobile_cpu);
       $mobile->setMobileRam($mobile_ram);
       $mobile->setMobileMemory($mobile_memory);
       $mobile->setCamera($camera);
       $mobile->setMobilePrice($mobile_price);
       $mobile->setDateAdded(date("Y/m/d"));

       $mobile->setSold(False);
       $mobile->setUserId($this->userId);
       //$root=$this->urlGenerator->getAbsoluteUrl("/");
       //$file = $this->request->getUploadedFile("computer_image");
       //$path = $file["name"];
       //$ext = pathinfo($path, PATHINFO_EXTENSION);
       //$path = "data/" . $this->userId . "/Computers/" . md5($file["name"]) . "." . $ext;
       //move_uploaded_file($file["tmp_name"], $path);
       //$mobile->setImage($root . "remote.php/webdav/Computers/" . md5($file["name"]) . "." . $ext);
       $this->mapper->insert($mobile);

       $url = $this->urlGenerator->linkToRoute("ownnotes.mobile.index", array("message" => "Mobile added"));
       return new RedirectResponse($url);
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function buy($id) {
         $mobiles = $this->mapper->findById($id);
         if (count($mobiles) == 0) {
          $url = $this->urlGenerator->linkToRoute("ownnotes.mobile.index");
          return new RedirectResponse($url);
         }
         $mobile = $mobiles[0];
         if ($mobile->getSold() == true) {
           if ($this->userId == $mobile->getUserId()) {
            $url = $this->urlGenerator->linkToRoute("ownnotes.mobile.index", array("message" => "Mobile Already yours", "warn" => "true"));
            return new RedirectResponse($url);
           }
           else {
            $url = $this->urlGenerator->linkToRoute("ownnotes.mobile.index", array("message" => "Mobile Already sold", "warn" => "true"));
            return new RedirectResponse($url);
           }

         }
         $mobile->setUserId($this->userId);
         $mobile->setSold(true);
         $mobile->setDateSold(date("Y/m/d"));
         $this->mapper->update($mobile);
         $url = $this->urlGenerator->linkToRoute("ownnotes.mobile.index", array("message" => "You bought this mobile"));
         return new RedirectResponse($url);
     }

     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function search($filter_sold, $mobile_model) {
       $indexUrl = $this->urlGenerator->linkToRoute("ownnotes.page.index");
       $computerUrl = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
       $mobileUrl = $this->urlGenerator->linkToRoute("ownnotes.mobile.index");
       $statsUrl = $this->urlGenerator->linkToRoute("ownnotes.computer.stats");
       $mobiles = $this->mapper->filterMobiles($filter_sold, strtolower($mobile_model));
       return new TemplateResponse('ownnotes', 'mobiles', array("mobiles" => $mobiles, "message" => $message,
        "indexUrl" => $indexUrl, 'computerUrl' => $computerUrl, "mobileUrl" => $mobileUrl, "statsUrl" => $statsUrl));
     }

 }
