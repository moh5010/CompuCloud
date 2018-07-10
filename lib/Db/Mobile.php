<?php
namespace OCA\OwnNotes\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Mobile extends Entity {

    protected $mobileName;
    protected $mobileModel;
    protected $mobileCpu;
    protected $mobileRam;
    protected $mobileMemory;
    protected $camera;
    protected $mobilePrice;
    protected $mobileImage;
    protected $userId;
    protected $sold;
    protected $dateSold;
    protected $dateAdded;

}
