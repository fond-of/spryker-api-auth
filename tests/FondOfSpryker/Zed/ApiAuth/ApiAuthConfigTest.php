<?php

namespace FondOfSpryker\Zed\ApiAuth;

use Codeception\Test\Unit;
use org\bovigo\vfs\vfsStream;
use Spryker\Shared\Config\Config;

class ApiAuthConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ApiAuth\ApiAuthConfig
     */
    protected $apiAuthConfig;

    /**
     * @var \org\bovigo\vfs\vfsStreamDirectory
     */
    protected $vfsStreamDirectory;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->vfsStreamDirectory = vfsStream::setup('root', null, [
            'config' => [
                'Shared' => [
                    'stores.php' => file_get_contents(codecept_data_dir('stores.php')),
                    'config_default.php' => file_get_contents(codecept_data_dir('empty_config_default.php')),
                ],
            ],
        ]);

        $this->apiAuthConfig = new ApiAuthConfig();
    }

    /**
     * @return void
     */
    public function testGetDefaultRawToken()
    {
        Config::getInstance()->init();

        $this->assertEquals('', $this->apiAuthConfig->getRawToken());
    }

    /**
     * @return void
     */
    public function testGetCustomRawToken()
    {
        $fileUrl = vfsStream::url('root/config/Shared/config_default.php');
        $newFileContent = file_get_contents(codecept_data_dir('config_default.php'));
        file_put_contents($fileUrl, $newFileContent);

        Config::getInstance()->init();

        $this->assertEquals('cmF3X3Rva2VuOnJhd190b2tlbg==', $this->apiAuthConfig->getRawToken());
    }
}
