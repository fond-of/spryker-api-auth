<?php

namespace FondOfSpryker\Zed\ApiAuth;

use FondOfSpryker\Shared\ApiAuth\ApiAuthConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class ApiAuthConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getRawToken(): string
    {
        return $this->get(ApiAuthConstants::RAW_TOKEN, '');
    }
}
