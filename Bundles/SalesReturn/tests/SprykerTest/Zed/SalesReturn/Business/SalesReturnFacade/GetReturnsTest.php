<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\SalesReturn\Business\SalesReturnFacade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\ReturnFilterTransfer;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group SalesReturn
 * @group Business
 * @group SalesReturnFacade
 * @group GetReturnsTest
 * Add your own group annotations below this line
 */
class GetReturnsTest extends Unit
{
    protected const DEFAULT_OMS_PROCESS_NAME = 'Test01';

    protected const FAKE_CUSTOMER_REFERENCE = 'FAKE_CUSTOMER_REFERENCE';
    protected const FAKE_RETURN_REFERENCE = 'FAKE_RETURN_REFERENCE';

    /**
     * @var \SprykerTest\Zed\SalesReturn\SalesReturnBusinessTester
     */
    protected $tester;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->configureTestStateMachine([static::DEFAULT_OMS_PROCESS_NAME]);
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsFromPersistence(): void
    {
        // Arrange
        $customerTransfer = $this->tester->haveCustomer();

        $firstReturnTransfer = $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME, $customerTransfer);
        $secondReturnTransfer = $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME, $customerTransfer);

        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference($customerTransfer->getCustomerReference());

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        // Assert
        $this->assertCount(2, $returnCollectionTransfer->getReturns());
        $this->assertEquals($secondReturnTransfer, $returnCollectionTransfer->getReturns()->offsetGet(0));
        $this->assertEquals($firstReturnTransfer, $returnCollectionTransfer->getReturns()->offsetGet(1));
    }

    /**
     * @return void
     */
    public function testGetReturnsEnsureReturnItemsExists(): void
    {
        // Arrange
        $returnTransfer = $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME);

        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference($returnTransfer->getCustomerReference());

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        /** @var \Generated\Shared\Transfer\ReturnTransfer $storedReturnTransfer */
        $storedReturnTransfer = $returnCollectionTransfer->getReturns()->getIterator()->current();

        // Assert
        $this->assertCount(2, $storedReturnTransfer->getReturnItems());
        $this->assertEquals(
            $returnTransfer->getReturnItems()->offsetGet(0),
            $storedReturnTransfer->getReturnItems()->offsetGet(0)
        );
        $this->assertEquals(
            $returnTransfer->getReturnItems()->offsetGet(1),
            $storedReturnTransfer->getReturnItems()->offsetGet(1)
        );
    }

    /**
     * @return void
     */
    public function testGetReturnsEnsureReturnTotalsExists(): void
    {
        // Arrange
        $returnTransfer = $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME);

        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference($returnTransfer->getCustomerReference());

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        /** @var \Generated\Shared\Transfer\ReturnTransfer $storedReturnTransfer */
        $storedReturnTransfer = $returnCollectionTransfer->getReturns()->getIterator()->current();

        // Assert
        $this->assertEquals($returnTransfer->getReturnTotals(), $storedReturnTransfer->getReturnTotals());
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsByCustomerReferenceFilter(): void
    {
        // Arrange
        $customerTransfer = $this->tester->haveCustomer();

        $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME);
        $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME, $customerTransfer);

        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference($customerTransfer->getCustomerReference());

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        /** @var \Generated\Shared\Transfer\ReturnTransfer $storedReturnTransfer */
        $storedReturnTransfer = $returnCollectionTransfer->getReturns()->getIterator()->current();

        // Assert
        $this->assertCount(1, $returnCollectionTransfer->getReturns());
        $this->assertSame($customerTransfer->getCustomerReference(), $storedReturnTransfer->getCustomerReference());
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsByFakeCustomerReferenceFilter(): void
    {
        // Arrange
        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference(static::FAKE_CUSTOMER_REFERENCE);

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        // Assert
        $this->assertCount(0, $returnCollectionTransfer->getReturns());
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsByReturnReferenceFilter(): void
    {
        $returnTransfer = $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME);

        // Arrange
        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setReturnReference($returnTransfer->getReturnReference());

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        /** @var \Generated\Shared\Transfer\ReturnTransfer $storedReturnTransfer */
        $storedReturnTransfer = $returnCollectionTransfer->getReturns()->getIterator()->current();

        // Assert
        $this->assertCount(1, $returnCollectionTransfer->getReturns());
        $this->assertEquals($returnTransfer, $storedReturnTransfer);
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsByFakeReturnReferenceFilter(): void
    {
        // Arrange
        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setReturnReference(static::FAKE_RETURN_REFERENCE);

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        // Assert
        $this->assertCount(0, $returnCollectionTransfer->getReturns());
    }

    /**
     * @return void
     */
    public function testGetReturnsRetrievesReturnsByFilter(): void
    {
        // Arrange
        $customerTransfer = $this->tester->haveCustomer();

        $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME, $customerTransfer);
        $this->tester->createReturnByStateMachineProcessName(static::DEFAULT_OMS_PROCESS_NAME, $customerTransfer);

        $returnFilterTransfer = (new ReturnFilterTransfer())
            ->setCustomerReference($customerTransfer->getCustomerReference())
            ->setFilter((new FilterTransfer())->setLimit(1));

        // Act
        $returnCollectionTransfer = $this->tester
            ->getFacade()
            ->getReturns($returnFilterTransfer);

        // Assert
        $this->assertCount(1, $returnCollectionTransfer->getReturns());
    }
}
