<?php

namespace ByTIC\eSignAnyWhere\Normalizer;

use ByTIC\eSignAnyWhere\Normalizer\Authorization\Response200Normalizer;

/**
 * Class NormalizerFactory
 * @package ByTIC\eSignAnyWhere\Normalize
 */
class NormalizerFactory
{
    /**
     * @return array
     */
    public static function create()
    {
        $normalizers = [];
        $normalizers[] = new Response200Normalizer();
        return $normalizers;
    }
}