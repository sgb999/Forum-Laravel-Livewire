<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(isset($page_title))
        <title>{{ $page_title }}</title>
    @endif
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/header.css') }}">
</head>
<nav id="navbar">
    <h1 id="header">Assassin's creed forum</h1>
    <ul class="topnav">
        <li><a href="{{ route('home') }}">View Categories</a></li>
        @auth
            <li v-if="user" class="right"><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out red"></span> Sign out</a></li>
            <li v-if="user" class="right"><a href="#"><span class="glyphicon glyphicon-envelope yellow"></span>Messages</a></li>
            <li v-if="user" class="right"><a href="#">Profile</a></li>
        @endauth
        @guest
            <li class="right"><a href="{{ route('registerPage') }}"><span class="glyphicon glyphicon-user green"></span>Sign Up</a></li>
            <li class="right"><a href="{{ route('loginPage') }}"><span class="glyphicon glyphicon-log-in green"></span>Login</a></li>
        @endguest
    </ul>
</nav>



