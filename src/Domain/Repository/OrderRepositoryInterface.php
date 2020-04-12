<?php
namespace CleanPhp\Invoicer\Domain\Repository;

interface OrderRepositoryInterface extends RepositoryInterface {

  public function getInvoicedOrders();

  public function createFromOrder(Order $order);
}

 ?>
