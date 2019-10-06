<?php

namespace ByTIC\eSignAnyWhere\Client\Traits;

use ByTIC\eSignAnyWhere\Client\Client;
use ByTIC\eSignAnyWhere\Endpoints\Envelope\EnvelopeCreate;
use ByTIC\eSignAnyWhere\Models\Envelope\DraftCreateModel;

/**
 * Trait EnvelopeEndpointsTrait
 * @package ByTIC\eSignAnyWhere\Client\Traits
 */
trait EnvelopeEndpointsTrait
{
    /**
     * @param array|DraftCreateModel $data
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \ByTIC\eSignAnyWhere\Models\SspFile\FileResult|null
     */
    public function envelopeCreate($data, string $fetch = Client::FETCH_OBJECT)
    {
        return $this->executePsr7Endpoint(new EnvelopeCreate($data), $fetch);
    }

}