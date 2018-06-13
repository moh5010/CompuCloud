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

    public function findById($id) {
      $sql = "SELECT * from *PREFIX*computers WHERE id=?";
      return $this->findEntities($sql, [$id]);
    }

    public function filterComs($filter_sold, $company_name) {
      $sql = "SELECT * FROM *PREFIX*computers ";
      if ($filter_sold) {
        $sql .= "WHERE sold=0";
        if ($company_name) {
          $sql .= " AND computer_company = ?";
          return $this->findEntities($sql, [$company_name]);
        }
      }
      else {
        if ($company_name) {
          $sql .= "WHERE computer_company = ?";
          return $this->findEntities($sql, [$company_name]);
        }
      }
      return $this->findEntities($sql);
    }
}
