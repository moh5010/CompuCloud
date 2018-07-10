<?php
namespace OCA\OwnNotes\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class MobileMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'mobiles', '\OCA\OwnNotes\Db\Mobile');
    }

    public function findAll() {
        $sql = 'SELECT * FROM *PREFIX*mobiles';
        return $this->findEntities($sql);
    }

    public function findUnsold() {
      $sql = "SELECT * from *PREFIX*mobiles WHERE sold=0";
      return $this->findEntities($sql);
    }

    public function getSoldToday() {
      $sql = "SELECT * from *PREFIX*mobiles where date_sold = CURDATE() AND sold=1";
      return $this->findEntities($sql);
    }

    public function findById($id) {
      $sql = "SELECT * from *PREFIX*mobiles WHERE id=?";
      return $this->findEntities($sql, [$id]);
    }

    public function filterMobiles($filter_sold, $model_name) {
      $sql = "SELECT * FROM *PREFIX*mobiles ";
      if ($filter_sold) {
        $sql .= "WHERE sold=0";
        if ($company_name) {
          $sql .= " AND mobile_model = ?";
          return $this->findEntities($sql, [$model_name]);
        }
      }
      else {
        if ($model_name) {
          $sql .= "WHERE mobile_model = ?";
          return $this->findEntities($sql, [$model_name]);
        }
      }
      return $this->findEntities($sql);
    }
}
