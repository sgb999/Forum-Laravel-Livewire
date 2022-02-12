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
<header class="navbar-mobile">
    <h1 id="header">Assassin's creed forum</h1>
    <button id="hamburger">☰</button>
</header>
<div id="div-header">
    <ul id="ul-header" class="navbar-grid">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('categories') }}">View Categories</a></li>
        <h1 id="header-desktop">Assassin's creed forum</h1>
        @auth
            <li class="right"><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out red"></span> Sign out</a></li>
            <li class="right"><a href="#"><span class="glyphicon glyphicon-envelope yellow"></span>Messages</a></li>
        @endauth
        @guest
            <li class="right"><a href="{{ route('registerPage') }}"><span class="glyphicon glyphicon-user green"></span>Sign Up</a></li>
            <li class="right"><a href="{{ route('loginPage') }}"><span class="glyphicon glyphicon-log-in green"></span>Login</a></li>
        @endguest
    </ul>
</div>


