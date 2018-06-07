<?php
namespace OCA\OwnNotes\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Computer extends Entity implements JsonSerializable {

    protected $computer_name;
    protected $computer_model;
    protected $computer_cpu;
    protected $computer_ram;
    protected $computer_hard;
    protected $computer_price;
    protected $userId;

    /*public function jsonSerialize() {
        return [
            'id' => $this->id,
            'com' => $this->title,
            'content' => $this->content
        ];
    }*/

}
