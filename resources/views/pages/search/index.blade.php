@extends('layouts.app')

@section('title', 'Search')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-12">
            <h1 class="title" itemprop="name">Search</h1>
            <p class="subtitle" itemprop="description">Can't find what your looking for?</p>

            <div class="box">
                <form action="{{ route('search') }}" method="get" autocomplete="off">
                    @csrf
                    <div class="field">
                        <label for="query" class="label">Search the site</label>
                        <input class="input" type="search" name="query" id="query" value="{{ $query ?? '' }}">
                    </div>
                    <div class="field">
                        <button class="button is-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>

            @if (count($results) >= 1)
                <h2 class="title is-4">Search results</h2>
                <div class="columns is-multiline">
                    @foreach ($results as $product)
                    <div class="column is-3">
                        @include('shared.product-card', $product)
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
