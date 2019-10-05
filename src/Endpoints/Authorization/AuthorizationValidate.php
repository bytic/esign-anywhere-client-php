<?php

namespace ByTIC\eSignAnyWhere\Endpoints\Authorization;

use ByTIC\eSignAnyWhere\Endpoints\AbstractPsr7Endpoint;
use Jane\OpenApiRuntime\Client\Client;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AuthorizationValidate
 * @package ByTIC\eSignAnyWhere\Endpoints\Authorization
 */
class AuthorizationValidate extends AbstractPsr7Endpoint
{

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @inheritDoc
     */
    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return '/authorization';
    }

    /**
     * @inheritDoc
     */
    protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->denormalize(true, \ByTIC\eSignAnyWhere\Models\Authorization\Response200::class);
        }
        return $serializer->denormalize(true, \ByTIC\eSignAnyWhere\Models\Authorization\Response401::class, 'json');
    }
}