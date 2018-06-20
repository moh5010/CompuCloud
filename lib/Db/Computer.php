<?php
namespace OCA\OwnNotes\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Computer extends Entity {

    protected $computerCompany;
    protected $computerModel;
    protected $cpu;
    protected $ram;
    protected $hardCapacity;
    protected $image;
    protected $price;
    protected $userId;
    protected $dateSold;
    protected $dateAdded;
    protected $sold;

    /*public function jsonSerialize() {
        return [
            'id' => $this->id,
            'com' => $this->title,
            'content' => $this->content
        ];
    }*/

}
