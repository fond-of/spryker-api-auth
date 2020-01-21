<?php

namespace FondOfSpryker\Zed\ApiAuth\Business\Model;

class BasicAuth implements AuthInterface
{
    protected const AUTH_TYPE = 'Basic';

    /**
     * @var \FondOfSpryker\Zed\ApiAuth\Business\Model\TokenInterface
     */
    protected $token;

    /**
     * @param \FondOfSpryker\Zed\ApiAuth\Business\Model\TokenInterface $token
     */
    public function __construct(
        TokenInterface $token
    ) {
        $this->token = $token;
    }

    /**
     * @param string $authorizationHeader
     *
     * @return bool
     */
    public function isAuthorized(string $authorizationHeader): bool
    {
        $rawToken = $this->extractToken($authorizationHeader);

        return $this->token->check($rawToken);
    }

    /**
     * @param string $authorizationHeader
     *
     * @return string
     */
    protected function extractToken(string $authorizationHeader): string
    {
        $position = strpos($authorizationHeader, static::AUTH_TYPE);

        if ($position === false) {
            return $authorizationHeader;
        }

        return substr($authorizationHeader, $position + strlen(static::AUTH_TYPE) + 1);
    }
}
