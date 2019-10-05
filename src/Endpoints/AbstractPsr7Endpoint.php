<?php

namespace ByTIC\eSignAnyWhere\Endpoints;

use Jane\OpenApiRuntime\Client\Psr7EndpointTrait;

/**
 * Class AbstractPsr7Endpoint
 * @package ByTIC\eSignAnyWhere\Client
 */
abstract class AbstractPsr7Endpoint extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    use Psr7EndpointTrait;
}