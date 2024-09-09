<?php

namespace App\Interfaces;

use App\Enums\MockSource;

interface ProviderInterface
{
    public function fetchData(MockSource $source): array;
}
