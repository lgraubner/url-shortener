<?php

namespace App\Jobs;

use App\Models\Link;
use App\Models\LinkInfo;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
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
        $client = new Client([
            'allow_redirects' => true,
        ]);

        $info = new LinkInfo;

        try {
            $response = $client->get($this->link->long_url, [
                'on_stats' => function (TransferStats $stats) use ($info) {
                    $info->url_fetched = $stats->getEffectiveUri();
                }
            ]);

            $info->domain = host($this->link->long_url);
            $info->url = $this->link->long_url;

            $http_status = $response->getStatusCode();
            $info->http_status = $http_status;

            if ($http_status === 200) {
                $content = $response->getBody()->getContents();
                $crawler = new Crawler($content);

                $title = $crawler->filter('head > title')->first()->text();

                $this->link->title = $title;
                $this->link->save();

                $info->html_title = $title;

                $info->content_length = $response->getHeader('Content-Length')[0];
                $info->content_type = $response->getHeader('Content-Type')[0];
            }

            $this->link->info()->save($info);
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
