<?php

namespace FondOfSpryker\Zed\ApiAuth\Communication\Plugin\Bootstrap;

use Codeception\Test\Unit;
use Silex\Application;

class ApiAuthBootstrapProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ApiAuth\Communication\Plugin\Bootstrap\ApiAuthBootstrapProvider|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $apiAuthBoostrapProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    protected $applicationMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->apiAuthBoostrapProvider = $this->getMockBuilder(ApiAuthBootstrapProvider::class)
            ->setMethods(['getFacade'])
            ->getMock();

        $this->applicationMock = $this->getMockBuilder(Application::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return void
     */
    public function testBoot(): void
    {
        $this->apiAuthBoostrapProvider->boot();
    }
}
