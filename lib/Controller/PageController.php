<?php
 namespace OCA\OwnNotes\Controller;

 use OCP\IRequest;
 use \OCP\IURLGenerator;
 use OCP\AppFramework\Http\TemplateResponse;
 use OCP\AppFramework\Controller;

 class PageController extends Controller {

     public function __construct($AppName, IRequest $request, IURLGenerator $urlGenerator){
         parent::__construct($AppName, $request);

         $this->urlGenerator = $urlGenerator;
     }
     /**
      * @NoAdminRequired
      * @NoCSRFRequired
      */
     public function index() {
       $indexUrl = $this->urlGenerator->linkToRoute("ownnotes.page.index");
       $computerUrl = $this->urlGenerator->linkToRoute("ownnotes.computer.index");
       $mobileUrl = $this->urlGenerator->linkToRoute("ownnotes.mobile.index");
       return new TemplateResponse('ownnotes', 'main', array(
          'indexUrl' => $indexUrl, 'computerUrl' => $computerUrl, 'mobileUrl' => $mobileUrl ));
     }

 }
