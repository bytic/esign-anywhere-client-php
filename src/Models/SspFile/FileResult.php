<?php

namespace ByTIC\eSignAnyWhere\Models\SspFile;

/**
 * Class FileResult
 * @package ByTIC\eSignAnyWhere\Models\SspFile
 */
class FileResult
{
    /**
     * @var string
     */
    protected $sspFileId;

    /**
     * @return int
     */
    public function getSspFileId(): string
    {
        return $this->sspFileId;
    }

    /**
     * @param string $sspFileId
     */
    public function setSspFileId(string $sspFileId): void
    {
        $this->sspFileId = $sspFileId;
    }
}
