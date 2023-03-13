<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    protected $devApi = "https://dev.to/api";

    public function index()
    {
        $articles = Cache::remember('blog', 900, function () {
            $devArticles = [];

            try {
                $apiResponse = Http::get($this->devApi . '/articles?username=' . env('DEVTO'));

                if ($apiResponse->ok()) {
                    $devArticles = $apiResponse->json();
                }
            } catch (ConnectionException $connectionException) {
            }

            return $devArticles;
        });

        return view('blog', [
            'devArticles' => $articles
        ]);
    }
}
