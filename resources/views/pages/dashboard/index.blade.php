@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">

    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
        </ul>
    </nav>

    <h1 class="title">
        Dashboard
    </h1>

    <hr>

    <div class="columns is-marginless is-centered">
        <aside class="column is-3">
            @include('pages.dashboard.shared.sidebar')
        </aside>

        <main class="column">
            <p>Stuff here</p>
        </main>
    </div>
</div>
@endsection
