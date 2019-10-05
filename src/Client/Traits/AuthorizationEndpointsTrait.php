<?php

namespace ByTIC\eSignAnyWhere\Client\Traits;

use ByTIC\eSignAnyWhere\Endpoints\Authorization\AuthorizationValidate;
use ByTIC\eSignAnyWhere\Client\Client;

/**
 * Trait AuthorizationEndpointsTrait
 * @package ByTIC\eSignAnyWhere\Client\Traits
 */
trait AuthorizationEndpointsTrait
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JoliCode\Slack\Api\Model\AuthTestGetResponse200|\JoliCode\Slack\Api\Model\AuthTestGetResponsedefault|\Psr\Http\Message\ResponseInterface|null
     */
    public function authTest(string $fetch = Client::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new AuthorizationValidate(), $fetch);
    }
}