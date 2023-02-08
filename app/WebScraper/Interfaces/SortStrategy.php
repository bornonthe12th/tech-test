<?php

namespace App\WebScraper\Interfaces;

interface SortStrategy
{
    public function sort(array $data): array;
}
