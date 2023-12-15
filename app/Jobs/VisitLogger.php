<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Visitors;
use Illuminate\Http\Request;

class VisitLogger implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $method;
    private $url;
    private $referer;
    private $languages;
    private $useragent;
    private $device;
    private $platform;
    private $browser;
    private $ip;
    private $visitor_id;
    private array $bots_user_agents=[];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($method, $url, $referer, $languages, $useragent, $device, $platform, $browser)
    {
//        $endpoint = "checkip.amazonaws.com";
//        $client = new Client(['verify' => false]);
//        $response = $client->request('GET', $endpoint);
//        $statusCode = $response->getStatusCode();
//        $ip = $response->getBody()->getContents();
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $this->method = $method;
        $this->url = $url;
        $this->referer = $referer;
        $this->languages = $languages;
        $this->useragent = $useragent;
        $this->device = $device;
        $this->platform = $platform;
        $this->browser = $browser;
        $this->ip=$ip;
        $this->visitor_id="$this->ip"."_"."$this->useragent";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->ip!='41.80.15.40' && $this->ip!='41.80.79.117'){

            Visitors::create([
                'method' => $this->method,
                'url' => $this->url,
                'referer' => $this->referer,
                'languages' => json_encode($this->languages),
                'useragent' => $this->useragent,
                'device' => $this->device,
                'platform' => $this->platform,
                'browser' => $this->browser,
                'ip' => $this->ip,
                'visitor_id' => $this->visitor_id
            ]);
        }


    }
}
