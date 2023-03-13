@extends('layouts.app')

@section('pageTitle', 'Blog - Gürkan Biçer')
@section('pageDescription', 'Programlama ve sunucu yönetimi üzerine aldığım notlar')
@section('pageKeywords', 'developer blog, back-end developer, php developer, yazılım mühendisi, yazılımcı, software engineer, gürkan biçer')

@section('content')
    <div class="container justify-content-center text-center my-5">
        <div class="top-0 end-0 me-4 mt-4 position-absolute">
            <a class="fs-5 text-decoration-none text-dark" href="{{ route('home') }}">
                Portfolyo <i class="fas fa-user ms-1"></i>
            </a>
        </div>

        <a href="{{ route('home') }}" class="text-decoration-none text-black">
            <img src="{{ asset('who.webp') }}" width="150px" height="150px" class="rounded-circle img-thumbnail mb-3"
                 alt="{{ env('ME') }}">
            <h1>{{ env('ME') }}</h1>
        </a>
        <p class="fs-5">Blog</p>

        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="list-group text-start">
                    @if(!empty($devArticles))
                        @foreach($devArticles as $article)
                            <a href="{{ $article['url'] }}" class="list-group-item list-group-item-action mb-4 py-3 rounded-0"
                               target="_blank">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3 class="fs-3 mb-2">{{ $article['title'] }}</h3>
                                    <small><i class="fab fa-dev fa-2x"></i></small>
                                </div>
                                <p class="mb-4 justify-content-start">{{ $article['description'] }}</p>
                                <small class="text-muted d-block mb-1"><i class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($article['published_timestamp'])->format('d/m/Y H:i') }}</small>
                                <small class="text-muted"><i class="fa fa-tags me-1"></i> {{ $article['tags'] }}</small>
                            </a>
                        @endforeach
                    @else
                        <p class="fs-5 text-muted">Herhangi bir sonuç bulunamadı.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
