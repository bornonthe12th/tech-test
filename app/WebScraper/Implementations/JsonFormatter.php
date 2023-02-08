<?php

namespace App\WebScraper\Implementations;

use App\WebScraper\Interfaces\ResultFormatter;

class JsonFormatter implements ResultFormatter
{
    public function write(array $data): string
    {
        return json_encode($data);
    }
}
