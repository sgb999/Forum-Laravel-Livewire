<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap core CSS -->
    <!--<link href="/css/bootstrap.css" rel="stylesheet">-->
    <!-- Bootstrap theme -->
    <!--<link href="/css/bootstrap-theme.css" rel="stylesheet">-->
    <!--custom CSS theme -->
    <!--<link href="/css/my-style.css" rel="stylesheet">-->
    @if(isset($page_title))
        <title>{{ $page_title }}</title>
    @endif
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/header.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Assassin's creed forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">View Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            @auth
                <a class="navbar-text" href="{{ route('logout') }}">Sign out</a>
                <a class="navbar-text" href="#">Messages</a>
            @endauth
            @guest
                <a class="navbar-text" href="{{ route('registerPage') }}">Sign Up </a>
                <a class="navbar-text" href="{{ route('loginPage') }}"> Login</a>
            @endguest
        </div>
    </div>
</nav>



