<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationRepository
{
    public function get($key)
    {
        $config = Configuration::where('key', $key)->first();
        return $config ? $config->value : null;
    }

    public function set($key, $value)
    {
        $config = Configuration::updateOrCreate(['key' => $key], ['value' => $value]);
        return $config;
    }
}
