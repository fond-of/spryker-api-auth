<?php

namespace FondOfSpryker\Zed\ApiAuth\Business;

interface ApiAuthFacadeInterface
{
    /**
     * @api
     *
     * @param string $authorizationHeader
     *
     * @return bool
     */
    public function isAuthenticated(string $authorizationHeader): bool;
}
