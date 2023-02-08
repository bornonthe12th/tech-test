<?php

namespace App\WebScraper\Services;

use App\WebScraper\Interfaces\ResultFormatter;
use App\WebScraper\Interfaces\SortStrategy;
use App\WebScraper\Interfaces\WebScraper;

readonly class WebScraperService
{
    public function __construct(
        public WebScraper $webScraper,
        public ResultFormatter $resultFormatter,
        public SortStrategy $sortStrategy
    ) {
    }

    public function scrape(): string
    {
        $results = $this->webScraper->scrape();
        return $this->resultFormatter->write(
            $this->sortStrategy->sort($results)
        );
    }
}
