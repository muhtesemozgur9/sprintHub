<?php

namespace App\Providers;

use App\Interfaces\ProviderInterface;

class ProviderContext
{
    protected ProviderInterface $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function fetchData($source)
    {
        return $this->provider->fetchData($source);
    }
}
