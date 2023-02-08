<?php

namespace App\WebScraper\Implementations;

use App\WebScraper\Interfaces\SortStrategy;

class SortByPrice implements SortStrategy
{
    public function sort(array $data): array
    {
        return collect($data)->sortBy(function ($item) {
            preg_match('/£(?<price>.*)/', $item['price'], $matches, PREG_OFFSET_CAPTURE);
            return $matches['price'][0];
        })->reverse()->values()->toArray();
    }
}
