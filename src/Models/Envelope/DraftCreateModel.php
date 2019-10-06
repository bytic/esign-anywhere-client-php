<?php

namespace ByTIC\eSignAnyWhere\Models\Envelope;

use ByTIC\eSignAnyWhere\Models\AbstractModel;

/**
 * Class DraftCreateModel
 * @package ByTIC\eSignAnyWhere\Models\SspFile
 */
class DraftCreateModel extends AbstractModel
{
    /**
     * @var string[]
     */
    protected $sspFileIds;

    /**
     * @var SendEnvelopeDescription
     */
    protected $sendEnvelopeDescription;

    /**
     * @var CreateDraftOptions
     */
    protected $createDraftOptions;

    /**
     * @return mixed
     */
    public function getSspFileIds()
    {
        return $this->sspFileIds;
    }

    /**
     * @param array $sspFileIds
     */
    public function setSspFileIds(array $sspFileIds): void
    {
        $this->sspFileIds = $sspFileIds;
    }

    /**
     * @return SendEnvelopeDescription
     */
    public function getSendEnvelopeDescription(): SendEnvelopeDescription
    {
        return $this->sendEnvelopeDescription;
    }

    /**
     * @param SendEnvelopeDescription|array $sendEnvelopeDescription
     */
    public function setSendEnvelopeDescription($sendEnvelopeDescription): void
    {
        if (is_array($sendEnvelopeDescription)) {
            $sendEnvelopeDescription = SendEnvelopeDescription::fromArray($sendEnvelopeDescription);
        }
        $this->sendEnvelopeDescription = $sendEnvelopeDescription;
    }

    /**
     * @return CreateDraftOptions
     */
    public function getCreateDraftOptions(): CreateDraftOptions
    {
        return $this->createDraftOptions;
    }

    /**
     * @param CreateDraftOptions|array $createDraftOptions
     */
    public function setCreateDraftOptions($createDraftOptions): void
    {
        if (is_array($createDraftOptions)) {
            $createDraftOptions = SendEnvelopeDescription::fromArray($createDraftOptions);
        }
        $this->createDraftOptions = $createDraftOptions;
    }
}
