<?php

namespace ByTIC\eSignAnyWhere\Models\Traits;

use ByTIC\eSignAnyWhere\Models\AbstractModel;

/**
 * Trait CreateFromArrayTrait
 * @package ByTIC\eSignAnyWhere\Models\Traits
 */
trait CreateFromArrayTrait
{
    /**
     * @param $array
     * @return CreateFromArrayTrait
     */
    public static function fromArray($array)
    {
        $object = new static();
        static::configureProperties($object, $array);
        return $object;
    }

    /**
     * @param AbstractModel|static $object
     * @param array $data
     */
    protected static function configureProperties($object, array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($object, $method)) {
                $object->$method($value);
            }
        }
    }
}
