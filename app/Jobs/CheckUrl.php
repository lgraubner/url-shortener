<?php

namespace App\Jobs;

use App\Models\Link;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckUrl implements ShouldQueue
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
     * @throws \Exception
     */
    public function handle()
    {
        $client = new Client();
        $googleApiKey = env('GOOGLE_API_KEY');

        if (empty($googleApiKey)) {
            throw new \Exception('No Google API key found. Please specify one with access to the Google Safe Browsing API in your .env file.');
        }

        $apiUrl = sprintf('https://safebrowsing.googleapis.com/v4/threatMatches:find?key=%s', $googleApiKey);
        $response = $client->post($apiUrl, [
            'json' => [
                'client' => [
                    'clientId' => 'url-shortener',
                    'clientVersion' => '1.0.0'
                ],
                'threatInfo' => [
                    'threatTypes' => ['MALWARE', 'SOCIAL_ENGINEERING'],
                    'platformTypes' => ['ANY_PLATFORM'],
                    'threatEntryTypes' => ["URL"],
                    'threatEntries' => [
                        [
                            'url' => $this->link->long_url
                        ]
                    ]
                ]
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            $body = json_decode($response->getBody(), true);

            $this->link->is_safe = empty($body);
            $this->link->save();
        }
    }
}
