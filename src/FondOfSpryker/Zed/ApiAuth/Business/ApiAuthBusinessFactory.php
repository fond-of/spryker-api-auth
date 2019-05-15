<?php

namespace FondOfSpryker\Zed\ApiAuth\Business;

use FondOfSpryker\Zed\ApiAuth\Business\Model\AuthInterface;
use FondOfSpryker\Zed\ApiAuth\Business\Model\BasicAuth;
use FondOfSpryker\Zed\ApiAuth\Business\Model\BasicToken;
use FondOfSpryker\Zed\ApiAuth\Business\Model\TokenInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ApiAuth\ApiAuthConfig getConfig()
 */
class ApiAuthBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ApiAuth\Business\Model\AuthInterface
     */
    public function createAuthModel(): AuthInterface
    {
        return new BasicAuth($this->createTokenModel());
    }

    /**
     * @return \FondOfSpryker\Zed\ApiAuth\Business\Model\TokenInterface
     */
    public function createTokenModel(): TokenInterface
    {
        return new BasicToken($this->getConfig()->getRawToken());
    }
}
