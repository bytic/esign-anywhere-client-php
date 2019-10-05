<?php

namespace ByTIC\eSignAnyWhere\Client;

use ByTIC\eSignAnyWhere\Client\Traits\AuthorizationEndpointsTrait;
use ByTIC\eSignAnyWhere\ESignAnyWhereApi;

/**
 * Class Client
 * @package ByTIC\eSignAnyWhere\Client
 */
class Client extends \Jane\OpenApiRuntime\Client\Psr18Client
{
    use AuthorizationEndpointsTrait;

    /**
     * @param null $httpClient
     * @return static
     */
    public static function create($httpClient = null)
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri(ESignAnyWhereApi::getBaseUri());
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer(
            \ByTIC\eSignAnyWhere\Normalizer\NormalizerFactory::create(),
            [
                new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(),
                    new \Symfony\Component\Serializer\Encoder\JsonDecode())
            ]);
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
