<?php

namespace ByTIC\eSignAnyWhere\Endpoints\SspFile;

use ByTIC\eSignAnyWhere\Endpoints\AbstractPsr7Endpoint;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class SspFileUploadTemporary
 * @package ByTIC\eSignAnyWhere\Endpoints\SspFile
 */
class SspFileUploadTemporary extends AbstractPsr7Endpoint
{
    protected $file;

    /**
     * SspFileUploadTemporary constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
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
        $builder = new MultipartStreamBuilder($streamFactory);
        $builder->addResource('File', fopen($this->file, 'r'), ['filename' => 'letter.pdf']);

        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();

        return [
            [
                'Content-Type' => 'multipart/form-data; boundary="'.$boundary.'"'
            ],
            $multipartStream
        ];
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return '/sspfile/uploadtemporary';
    }

    /**
     * @inheritDoc
     */
    protected function transformResponseBody(
        string $body,
        int $status,
        SerializerInterface $serializer,
        string $contentType = null
    ) {
        if (200 === $status) {
            return $serializer->denormalize($body, \ByTIC\eSignAnyWhere\Models\SspFile\FileResult::class, 'json');
        }
        return $serializer->denormalize(true, \ByTIC\eSignAnyWhere\Models\Response401::class, 'json');
    }
}