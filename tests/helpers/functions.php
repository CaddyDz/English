<?php

function create($model, $properties = [], $method = 'create', $times = null)
{
    return factory($model, $times)->$method($properties);
}
