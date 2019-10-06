<?php

namespace ByTIC\eSignAnyWhere\Client\Traits;

use ByTIC\eSignAnyWhere\Client\Client;
use ByTIC\eSignAnyWhere\Endpoints\SspFile\SspFileUploadTemporary;

/**
 * Trait SspFileEndpointsTrait
 * @package ByTIC\eSignAnyWhere\Client\Traits
 */
trait SspFileEndpointsTrait
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \ByTIC\eSignAnyWhere\Models\SspFile\FileResult|null
     */
    public function sspFileUploadTemporary($file, string $fetch = Client::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new SspFileUploadTemporary($file), $fetch);
    }

}