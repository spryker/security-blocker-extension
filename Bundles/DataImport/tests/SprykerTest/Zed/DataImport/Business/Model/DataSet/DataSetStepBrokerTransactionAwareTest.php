<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\DataImport\Business\Model\DataSet;

use Codeception\Test\Unit;
use Spryker\Zed\DataImport\Business\Exception\TransactionException;
use Spryker\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Zed\DataImport\Dependency\Propel\DataImportToPropelConnectionInterface;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group DataImport
 * @group Business
 * @group Model
 * @group DataSet
 * @group DataSetStepBrokerTransactionAwareTest
 * Add your own group annotations below this line
 * @property \SprykerTest\Zed\DataImport\BusinessTester $tester
 */
class DataSetStepBrokerTransactionAwareTest extends Unit
{
    /**
     * @return void
     */
    public function testExecuteOpensTransactionOnFirstCall(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(1, 1, false, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker();
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionOnlyOpenedOnceForConfiguredBulkSize(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(1, 1, false, true, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker(2);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionIsOpenedForeachConfiguredBulkSize(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(2, 2, false, true, true, false, true, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker(2);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
        $dataSetStepBrokerTransactionAware->execute($dataSet);

        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionNotOpenedWhenAlreadyInTransaction(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(0, 1, true, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker();
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionIsClosedForeachConfiguredBulkSize(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(1, 1, false, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker();
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionIsOnlyClosedOnceForConfiguredBulkSize(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(1, 1, false, true, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker(2);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testTransactionIsAlwaysClosedWhenThereIsAnOpenedOne(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(2, 2, false, true, true, false, true, true);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker(2);

        $dataSetStepBrokerTransactionAware->execute($dataSet);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @return void
     */
    public function testThrowsExceptionIfNoOpenTransactionGiven(): void
    {
        $propelConnectionMock = $this->getPropelConnectionMock(1, 0, false);
        $this->tester->setDependency(DataImportDependencyProvider::PROPEL_CONNECTION, $propelConnectionMock);

        $dataSet = $this->tester->getFactory()->createDataSet();
        $dataSetStepBrokerTransactionAware = $this->tester->getFactory()->createTransactionAwareDataSetStepBroker();

        $this->expectException(TransactionException::class);
        $dataSetStepBrokerTransactionAware->execute($dataSet);
    }

    /**
     * @param int $beginTransactionCalledCount
     * @param int $endTransactionCalledCount
     * @param mixed $isInTransaction
     *
     * @return \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\DataImport\Dependency\Propel\DataImportToPropelConnectionInterface
     */
    private function getPropelConnectionMock(int $beginTransactionCalledCount, int $endTransactionCalledCount, ...$isInTransaction)
    {
        $mockBuilder = $this->getMockBuilder(DataImportToPropelConnectionInterface::class)
            ->setMethods(['inTransaction', 'beginTransaction', 'endTransaction']);

        $propelConnectionMock = $mockBuilder->getMock();

        $propelConnectionMock->method('inTransaction')->will($this->onConsecutiveCalls(...$isInTransaction));
        $propelConnectionMock->expects($this->exactly($beginTransactionCalledCount))->method('beginTransaction');
        $propelConnectionMock->expects($this->exactly($endTransactionCalledCount))->method('endTransaction');

        return $propelConnectionMock;
    }
}
