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

            <section class="columns">
                <div class="column">
                    <a href="{{ route('dashboard.products') }}" class="box is-primary has-text-centered">
                        <p class="heading">Products</p>
                        <p class="title">{{ count($products) }}</p>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('dashboard.categories') }}" class="box has-text-centered">
                        <p class="heading">Categories</p>
                        <p class="title">{{ count($categories) }}</p>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('dashboard.brands') }}" class="box has-text-centered">
                        <p class="heading">Brands</p>
                        <p class="title">{{ count($brands) }}</p>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ route('dashboard.tags') }}" class="box has-text-centered">
                        <p class="heading">Tags</p>
                        <p class="title">{{ count($tags) }}</p>
                    </a>
                </div>
            </section>

        </main>
    </div>
</div>
@endsection
