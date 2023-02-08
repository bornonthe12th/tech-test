<?php

namespace Tests\Unit;

use App\WebScraper\Implementations\JsonFormatter;
use App\WebScraper\Implementations\SortByPrice;
use App\WebScraper\Interfaces\ResultFormatter;
use App\WebScraper\Interfaces\SortStrategy;
use App\WebScraper\Interfaces\WebScraper;
use App\WebScraper\Services\WebScraperService;
use PHPUnit\Framework\TestCase;

class SortByPriceTest extends TestCase
{

    public function testSortingImplementation()
    {
        $results = [
            [
                'option title' => 'Title A.',
                'description' => 'Description A',
                'price' => '£12.00',
                'discount' => 'Discount A',
            ],
            [
                'option title' => 'Title B.',
                'description' => 'Description B',
                'price' => '£5.00',
                'discount' => 'Discount B',
            ],
            [
                'option title' => 'Title C.',
                'description' => 'Description C',
                'price' => '£17.00',
                'discount' => 'Discount C',
            ]
        ];

        $orderedByPriceResults = [
            [
                'option title' => 'Title C.',
                'description' => 'Description C',
                'price' => '£17.00',
                'discount' => 'Discount C',
            ],
            [
                'option title' => 'Title A.',
                'description' => 'Description A',
                'price' => '£12.00',
                'discount' => 'Discount A',
            ],
            [
                'option title' => 'Title B.',
                'description' => 'Description B',
                'price' => '£5.00',
                'discount' => 'Discount B',
            ]
        ];

        $sortByPrice = new SortByPrice();
        $this->assertEquals($orderedByPriceResults, $sortByPrice->sort($results));
    }
}
