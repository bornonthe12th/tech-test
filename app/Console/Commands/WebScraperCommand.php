<?php

namespace App\Console\Commands;


use App\WebScraper\Services\WebScraperService;
use Illuminate\Console\Command;

class WebScraperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:web-scraper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command scrapes a url and returns data from the website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle(
        WebScraperService $webScraperService
    ) {
        $this->getOutput()->write($webScraperService->scrape()) ;
    }
}
