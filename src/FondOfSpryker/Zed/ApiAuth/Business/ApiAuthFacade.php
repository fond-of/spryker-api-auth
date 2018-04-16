<?php

namespace FondOfSpryker\Zed\ApiAuth\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ApiAuth\Business\ApiAuthBusinessFactory getFactory()
 */
class ApiAuthFacade extends AbstractFacade implements ApiAuthFacadeInterface
{
    /**
     * @api
     *
     * @param string $authorizationHeader
     *
     * @return bool
     */
    public function isAuthenticated(string $authorizationHeader): bool
    {
        return $this->getFactory()
            ->createAuthModel()
            ->isAuthorized($authorizationHeader);
    }
}
