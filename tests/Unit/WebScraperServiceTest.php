<?php

namespace Tests\Unit;

use App\WebScraper\Implementations\JsonFormatter;
use App\WebScraper\Implementations\SortByPrice;
use App\WebScraper\Interfaces\ResultFormatter;
use App\WebScraper\Interfaces\SortStrategy;
use App\WebScraper\Interfaces\WebScraper;
use App\WebScraper\Services\WebScraperService;
use PHPUnit\Framework\TestCase;

class WebScraperServiceTest extends TestCase
{

    protected function setUp(): void
    {
    }

    public function testScrape()
    {
        $results = [
            [
                'option title' => 'The optimum subscription providing you with enough service time to support the above-average with data and SMS services to allow access to your device.',
                'description' => 'Up to 12GB of data per year including 480 SMS(5p / MB data and 4p / SMS thereafter)',
                'price' => '£174.00',
                'discount' => 'Save £17.90 on the monthly price',
            ]
        ];
        $webScraper = \Mockery::mock(WebScraper::class);
        $resultFormatter = \Mockery::spy(ResultFormatter::class);
        $sortStrategy = \Mockery::spy(SortStrategy::class);

        $service = new WebScraperService($webScraper, $resultFormatter, $sortStrategy);
        $webScraper->shouldReceive('scrape')->times(1)->andReturn($results);
        $sortStrategy->shouldReceive('sort')->times(1)->andReturn($results);
        $resultFormatter->shouldReceive('write')->times(1)->andReturn(json_encode($results));
        $this->assertEquals(json_encode($results), $service->scrape());
    }

    public function testScrapeWithImplementation()
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
        $webScraper = \Mockery::mock(WebScraper::class);
        $resultFormatter = new JsonFormatter();
        $sortStrategy = new SortByPrice();

        $service = new WebScraperService($webScraper, $resultFormatter, $sortStrategy);
        $webScraper->shouldReceive('scrape')->times(1)->andReturn($results);
        $this->assertEquals(json_encode($orderedByPriceResults), $service->scrape());
    }

}
