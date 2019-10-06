<?php

namespace ByTIC\eSignAnyWhere\Models;

/**
 * Class Response200
 * @package ByTIC\eSignAnyWhere\Models
 */
class Response200
{
    /**
     * @var bool
     */
    protected $ok;

    /**
     * @return bool|null
     */
    public function getOk(): ?bool
    {
        return $this->ok;
    }

    /**
     * @param bool|null $ok
     *
     * @return self
     */
    public function setOk(?bool $ok): self
    {
        $this->ok = $ok;
        return $this;
    }
}
