<?php

namespace ByTIC\eSignAnyWhere\Models\Envelope;

use ByTIC\eSignAnyWhere\Models\AbstractModel;

/**
 * Class SendEnvelopeDescription
 * @package ByTIC\eSignAnyWhere\Models\Envelope
 */
class SendEnvelopeDescription extends AbstractModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var SendEnvelopeStep[]
     */
    protected $steps = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return SendEnvelopeStep[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * @param SendEnvelopeStep[] $steps
     */
    public function setSteps(array $steps): void
    {
        $this->steps = $steps;
    }
}