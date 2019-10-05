<?php

namespace ByTIC\eSignAnyWhere;

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\Plugin\HeaderAppendPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;
use ByTIC\eSignAnyWhere\Client\Client;

/**
 * Class ESignAnyWhereApi
 * @package ByTIC\eSignAnyWhere
 */
class ESignAnyWhereApi
{

    protected static $sandboxEndpoint = 'https://demo.xyzmo.com/Api/v4.0';
    protected static $productionEndpoint = 'https://www.significant.com/Api/v4.0';

    /**
     * @param $organizationKey
     * @param $userLoginName
     * @param ClientInterface|null $httpClient
     * @return Client
     */
    public static function create($organizationKey, $userLoginName, ClientInterface $httpClient = null): Client
    {
        // Find a default HTTP client if none provided
        if (null === $httpClient) {
            $httpClient = Psr18ClientDiscovery::find();
        }

        // Decorates the HTTP client with some plugins
        $uri = Psr17FactoryDiscovery::findUrlFactory()->createUri(self::getBaseUri());
        $pluginClient = new PluginClient($httpClient, [
            new ErrorPlugin(),
            new AddPathPlugin($uri),
            new AddHostPlugin($uri),
            new HeaderAppendPlugin([
                'organizationKey' => $organizationKey,
                'userLoginName' => $userLoginName,
                'User-Agent' => 'ByTIC\eSignAnyWhere API Client',
            ]),
        ]);

        // Instantiate an OpenApi client
        return Client::create($pluginClient);
    }

    /**
     * @return string
     */
    public static function getBaseUri()
    {
        return static::$sandboxEndpoint;
    }
}