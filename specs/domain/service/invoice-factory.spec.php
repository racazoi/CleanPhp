<?php

// use CleanPhp\Invoicer\Domain\Entity\Invoice;
// use CleanPhp\Invoicer\Domain\Entity\Order;
// use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;


// describe('InvoiceFactory', function() {
//   describe('->createFromOrder()', function() {
//
//     it('should return an order object', function() {
//       $order = new Order();
//       $factory = new InvoiceFactory();
//       $invoice = $factory->createFromOrder($order);
//
//       expect($invoice)->to->be->instanceof(
//         'CleanPhp\Invoicer\Domain\Entity\Invoice'
//       );
//     });
//
//   });
// });

$repo = 'CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface';

describe('InvoicingService', function () {
  describe('->generateInvoices()', function () {
    $this->repository = $this->getProphet()->prophesize($repo);

    it('should query the repository for uninvoiced Orders', function () {
      $this->repository->getUninvoicedOrders()->shouldBeCalled();
      $service = new InvoicingService($this->repository->reveal());
      $service->generateInvoices();
    });

    afterEach(function () {
      $this->getProphet()->checkPrediections();
    });

    it('should return an Invoice for each uninvoiced Order', function () {
      $orders = [(new Order())->setTotal(400)];
      $invoices = [(new Invoice())->setTotal(400)];

      $this->repository->getUninvoicedOrders()->willReturn($orders);
      $this->factory->createFromOrder($orders[0])->willReturn($$invoices[0]);

      $service = new InvoicingService(
        $this->repository->reveal(),
        $this->factory->reveal()
      );
      $results = $servie->generateInvoices();

      expect($results)->to->be->a('array');
      expect($results)->to->have->length(count($orders));
    });

    beforeEach(function () {
      $repo = 'CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface';
      $this->repository = $this->getProphet()->prophesize($repo);
      $this->factory = $this->getProphet()->prophesize('CleanPhp\Invoicer\Domain\Factory\InvoiceFactory');
    });

    it('should query the repository for uninvoiced Orders', function() {
      $this->repository->getUninvoicedOrders()->shouldBeCalled();
      $service = new InvoicingService(
        $this->repository->reveal(),
        $ths->factory->reveal()
      );
      $servie->generateInvoices();
    });
  });
  // ...

});





?>
