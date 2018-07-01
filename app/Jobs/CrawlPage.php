<?php

namespace App\Jobs;

use App\Models\Link;
use App\Models\Page;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\DomCrawler\Crawler;


class CrawlPage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Link
     */
    private $link;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * @param Link $link
     */
    public function handle()
    {
        $client = new Client();

        try {
            $response = $client->get($this->link->long_url);

            $page = new Page;

            if ($response->getStatusCode() === 200) {
                $content = $response->getBody()->getContents();
                $crawler = new Crawler($content);

                $title = $crawler->filter('head > title')->first()->text();

                $this->link->title = $title;
                $this->link->save();
            }

            // $this->link->save($page);
        } catch (\Exception $e) {
            //
        }

    }
}
