<?php

namespace FondOfSpryker\Zed\ApiAuth\Communication\Plugin\Bootstrap;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ApiAuth\Business\ApiAuthFacadeInterface;
use Silex\Application;

class ApiAuthBootstrapProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ApiAuth\Communication\Plugin\Bootstrap\ApiAuthBootstrapProvider|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $apiAuthBoostrapProvider;

    /**
     * @var \FondOfSpryker\Zed\ApiAuth\Business\ApiAuthFacadeInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $apiAuthFacadeMock;

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

        $this->apiAuthFacadeMock = $this->getMockBuilder(ApiAuthFacadeInterface::class)
            ->disableOriginalConstructor()
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
        $this->apiAuthBoostrapProvider->expects($this->atLeastOnce())
            ->method('getFacade')
            ->willReturn($this->apiAuthFacadeMock);

        $this->applicationMock->expects($this->atLeastOnce())
            ->method('before')
            ->with($this->isInstanceOf(\Closure::class), Application::EARLY_EVENT);

        $this->apiAuthBoostrapProvider->boot($this->applicationMock);
    }

    /**
     * @return void
     */
    public function testRegister(): void
    {
        $this->apiAuthBoostrapProvider->register($this->applicationMock);
    }
}
