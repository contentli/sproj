@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'A curated list of only the best and popular products')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-12">
            <h1 class="title" itemprop="name">Welcome to Leetmark</h1>
            <p class="subtitle" itemprop="description">A curated list of only the best and popular products</p>
            <hr>

            <h2 class="title is-4">Latest products</h2>
            <div class="columns is-multiline">
                @foreach ($products as $product)
                <div class="column is-3">
                    @include('shared.product-card', $product)
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
