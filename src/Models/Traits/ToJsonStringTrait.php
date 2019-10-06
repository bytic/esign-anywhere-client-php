<?php

namespace ByTIC\eSignAnyWhere\Models\Traits;

/**
 * Trait ToJsonStringTrait
 * @package ByTIC\eSignAnyWhere\Models\Traits
 */
trait ToJsonStringTrait
{

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                static::sanitizeForSerialization(),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(static::sanitizeForSerialization());
    }

    /**
     * @return array
     */
    public function sanitizeForSerialization()
    {
        $properties = get_object_vars($this);
        $data = [];
        foreach ($properties as $name => $value) {
            $name = static::sanitizeForSerializationPropertyName($name);
            $value = static::sanitizeForSerializationPropertyValue($value);
            $data[$name] = $value;
        }
        return $data;
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function sanitizeForSerializationPropertyName($name)
    {
        $name[0] = strtoupper($name[0]);
        return $name;
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function sanitizeForSerializationPropertyValue($value)
    {
        if (is_object($value)) {
            if(method_exists($value,'sanitizeForSerialization')) {
                $values = $value->sanitizeForSerialization();
                return (object)$values;
            }
        }
        return $value;
    }
}