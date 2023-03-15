<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    protected $devApi = "https://dev.to/api";

    protected function getArticles($perPage, $page, $cacheTTL = 900)
    {
        return Cache::remember("blog-per-$perPage-page-$page", $cacheTTL, function () use ($perPage, $page) {
            $devArticles = [];

            try {
                $apiResponse = Http::get($this->devApi . '/articles?username=' . env('DEVTO')
                    . "&per_page=$perPage&page=$page");

                if ($apiResponse->ok()) {
                    $devArticles = $apiResponse->json();
                }
            } catch (ConnectionException $connectionException) {
            }

            return $devArticles;
        });
    }

    public function index(Request $request)
    {
        $perPage = 5;
        $page = $request->input('page') ?? 1;

        $articles = $this->getArticles($perPage, $page);

        // API içerisinde next page, last page gibi değerler dönmediği için
        // ekstra bir istek göndermeye mecbur kaldık.
        // ama en azından yanıtları önbelleğe alıyoruz :)

        $prevPage = null;
        $nextPage = null;

        if ($page > 1) {
            $prevPage = $page - 1;
        }

        if (count($articles) == $perPage) {
            $nextPage = $page + 1;
            $nextPageArticles = $this->getArticles($perPage, $nextPage);

            // eğer sonraki sayfada hiç veri yoksa nextPage değeri null olsun
            if (count($nextPageArticles) == 0) {
                $nextPage = null;
            }
        }

        return view('blog', [
            'devArticles' => $articles,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
        ]);
    }
}
