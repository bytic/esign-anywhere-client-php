<?php

namespace ByTIC\eSignAnyWhere\Endpoints\Envelope;

use ByTIC\eSignAnyWhere\Endpoints\AbstractPsr7Endpoint;
use ByTIC\eSignAnyWhere\Models\Envelope\DraftCreateModel;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class EnvelopeCreate
 * @package ByTIC\eSignAnyWhere\Endpoints\Envelope
 */
class EnvelopeCreate extends AbstractPsr7Endpoint
{
    /**
     * @var DraftCreateModel
     */
    protected $draftCreateModel;

    /**
     * EnvelopeCreate constructor.
     * @param DraftCreateModel|array $draftCreateModel
     */
    public function __construct($draftCreateModel)
    {
        if (is_array($draftCreateModel)) {
            $draftCreateModel = DraftCreateModel::fromArray($draftCreateModel);
        }
        $this->draftCreateModel = $draftCreateModel;
    }


    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [
            [
                'accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            $this->draftCreateModel->__toString()
        ];
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return '/envelope/create';
    }

    protected function transformResponseBody(
        string $body,
        int $status,
        SerializerInterface $serializer,
        string $contentType = null
    ) {
        // TODO: Implement transformResponseBody() method.
    }
}
