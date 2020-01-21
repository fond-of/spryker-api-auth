<?php

namespace FondOfSpryker\Zed\ApiAuth\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ApiAuth\ApiAuthConfig;
use FondOfSpryker\Zed\ApiAuth\Business\Model\BasicAuth;
use FondOfSpryker\Zed\ApiAuth\Business\Model\BasicToken;

class ApiAuthBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ApiAuth\Business\ApiAuthBusinessFactory
     */
    protected $apiAuthBusinessFactory;

    /**
     * @var \FondOfSpryker\Zed\ApiAuth\ApiAuthConfig|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $apiAuthConfigMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->apiAuthBusinessFactory = new ApiAuthBusinessFactory();

        $this->apiAuthConfigMock = $this->getMockBuilder(ApiAuthConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiAuthBusinessFactory->setConfig($this->apiAuthConfigMock);
    }

    /**
     * @return void
     */
    public function testCreateAuthModel(): void
    {
        $this->apiAuthConfigMock->expects($this->atLeastOnce())
            ->method('getRawToken')
            ->willReturn('VDNTVDp0MyR0');

        $authModel = $this->apiAuthBusinessFactory->createAuthModel();

        $this->assertInstanceOf(BasicAuth::class, $authModel);
    }

    /**
     * @return void
     */
    public function testCreateTokenModel(): void
    {
        $this->apiAuthConfigMock->expects($this->atLeastOnce())
            ->method('getRawToken')
            ->willReturn('VDNTVDp0MyR0');

        $tokenModel = $this->apiAuthBusinessFactory->createTokenModel();

        $this->assertInstanceOf(BasicToken::class, $tokenModel);
    }
}
