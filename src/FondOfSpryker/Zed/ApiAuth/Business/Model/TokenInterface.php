<?php

namespace FondOfSpryker\Zed\ApiAuth\Business\Model;

interface TokenInterface
{
    /**
     * @param string $rawToken
     *
     * @return bool
     */
    public function check(string $rawToken): bool;
}
