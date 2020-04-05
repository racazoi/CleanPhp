<?php
namespace CleanPhp\Invoicer\Domain\Entitiy;

abstract class AbstractEntity {
  protected $id;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
    return $this;
  }
}

?>
