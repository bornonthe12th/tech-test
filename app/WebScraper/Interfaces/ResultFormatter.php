<?php

namespace App\WebScraper\Interfaces;

interface ResultFormatter
{
    public function write(array $data): string;
}
