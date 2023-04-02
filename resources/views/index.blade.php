@extends('layouts.app')

@section('pageTitle', 'Gürkan Biçer - Back-end Developer')
@section('pageDescription', 'Geliştirmeyi ve paylaşmayı seven, sunucu yönetimi ve back-end uygulamalarda uzmanlaşmış bir yazılım mühendisi.')
@section('pageKeywords', 'back-end developer, php developer, yazılım mühendisi, yazılımcı, software engineer, gürkan biçer')

@section('content')
    <div class="container justify-content-center text-center">
        <div class="top-0 end-0 me-4 mt-4 position-absolute">
            <a class="fs-5 text-decoration-none text-dark" href="{{ route('blog') }}">
                Blog <i class="fas fa-rss ms-1"></i>
            </a>
        </div>

        <a href="{{ route('home') }}" class="text-decoration-none text-black mb-0">
            <img src="{{ asset('who.webp') }}" width="150px" height="150px" class="rounded-circle img-thumbnail mb-3"
                 alt="{{ env('ME') }}">
            <h1>{{ env('ME') }}</h1>
        </a>
        <p class="fs-5 mb-5">{{ env('JOB_TITLE') }}</p>
        <p class="fs-6"><i class="fa fa-laptop me-1"></i> <br>{{ env('WORK_TITLE') }}</p>

        <div class="d-block mt-5">
            @if(env('MAIL'))
                <a href="mailto:{{ env('MAIL') }}" class="text-decoration-none me-3">
                    <i class="fas fa-envelope-open-text fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('INSTAGRAM'))
                <a href="https://instagram.com/{{ env('INSTAGRAM') }}" class="text-decoration-none me-3">
                    <i class="fab fa-instagram fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('SPOTIFY'))
                <a href="https://open.spotify.com/user/{{ env('SPOTIFY') }}" class="text-decoration-none me-3">
                    <i class="fab fa-spotify fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('LINKEDIN'))
                <a href="https://linkedin.com/in/{{ env('LINKEDIN') }}" class="text-decoration-none me-3">
                    <i class="fab fa-linkedin fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('GITHUB'))
                <a href="https://github.com/{{ env('GITHUB') }}" class="text-decoration-none me-3">
                    <i class="fab fa-github fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('DEVTO'))
                <a href="https://dev.to/{{ env('DEVTO') }}" class="text-decoration-none me-3">
                    <i class="fab fa-dev fa-2x text-dark"></i>
                </a>
            @endif
            @if(env('MEDIUM'))
                <a href="https://{{ env('MEDIUM') }}.medium.com/" class="text-decoration-none">
                    <i class="fab fa-medium fa-2x text-dark"></i>
                </a>
            @endif
        </div>
    </div>
@endsection
