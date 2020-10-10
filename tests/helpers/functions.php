<?php

declare(strict_types=1);

function create($model, $properties = [], $method = 'create', $times = null)
{
    return $model::factory($times)->$method($properties);
}
