<?php

namespace App\WebScraper\Implementations;

use App\WebScraper\Interfaces\WebScraper;
use Goutte\Client;
use GuzzleHttp\Exception\GuzzleException;

class WLDnsSystem implements WebScraper
{
    public function scrape(): array
    {
        $client = new Client();
        try {
            $crawler = $client->request('GET', 'https://wltest.dns-systems.net/');
        } catch (GuzzleException $e) {
            //Write message to a logger
            //var_dump($e->getMessage());
        }

        return $crawler->filter('.package-features')->each(function ($node) {
            $title = $node->filter('ul li .package-name')->text();
            $description = $node->filter('ul li .package-description')->text();
            $price = $node->filter('ul li .package-price span')->text();
            $discountNode = $node->filter('ul li .package-price p');

            if ($discountNode->count()) {
                $discount = $node->filter('ul li .package-price p')->text();
            } else {
                $discount = '';
            }
            return [
                'option title' => $title,
                'description' => $description,
                'price' => $price,
                'discount' => $discount,
            ];
        });
    }
}
