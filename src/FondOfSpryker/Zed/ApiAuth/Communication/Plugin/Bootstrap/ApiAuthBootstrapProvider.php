<?php

namespace FondOfSpryker\Zed\ApiAuth\Communication\Plugin\Bootstrap;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \FondOfSpryker\Zed\ApiAuth\Business\ApiAuthFacadeInterface getFacade()
 */
class ApiAuthBootstrapProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        $apiAuthFacade = $this->getFacade();

        $app->before(function (Request $request) use ($app, $apiAuthFacade) {
            $authorizationHeader = $request->headers->get('AUTHORIZATION');

            if (!$authorizationHeader || !$apiAuthFacade->isAuthenticated($authorizationHeader)) {
                return new Response('', 403);
            }
        }, Application::EARLY_EVENT);
    }
}
