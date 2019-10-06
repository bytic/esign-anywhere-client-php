<?php

namespace ByTIC\eSignAnyWhere\Models;

use ByTIC\eSignAnyWhere\Models\Traits\CreateFromArrayTrait;
use ByTIC\eSignAnyWhere\Models\Traits\ToJsonStringTrait;

/**
 * Class AbstractModel
 * @package ByTIC\eSignAnyWhere\Models
 */
abstract class AbstractModel
{
    use CreateFromArrayTrait;
    use ToJsonStringTrait;
}
