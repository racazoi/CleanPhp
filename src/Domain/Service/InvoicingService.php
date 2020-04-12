<?php

namespace CleanPhp\Invoicer\Domain\Service;

use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class InvoicingService {
  protected $orderRepository;
  protected $invoiceFactory;

  public function __construct(OrderRepositoryInterface $orderRepository, InvoiceFactory $invoiceFactory) {
    $this->$orderRepository = $orderRepository;
    $this->InvoiceFactory = $invoiceFactory;
  }

  public function generateInvoices() {
    $orders = $this->OrderRepository->getUninvoicedOrders();

    $invoices = [];

    foreach ($orders as $order) {
      $invoices[] = $this->invoiceFactory->createFromOrder($order);
    }

    return $invoices;
  }
}

?>