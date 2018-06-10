<?php
namespace OCA\OwnNotes\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class ComputerMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'computers', '\OCA\OwnNotes\Db\Computer');
    }

    public function findAll() {
        $sql = 'SELECT * FROM *PREFIX*computers';
        return $this->findEntities($sql);
    }

}
