@extends('layouts.app')

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
                    <div class="card" itemscope itemtype="http://schema.org/Product">
                        <a href="{{ route('product.show', $product) }}" class="card-image" aria-label="Read more about {{ $product->name }}">
                            <figure class="image is-8by5">
                                <img src="{{ $product->getFirstMediaUrl('product-images', 'large') ?? '' }}" alt="{{ $product->name }}">
                            </figure>
                        </a>
                        <div class="card-content">
                            <h3 class="title is-5"><a href="{{ route('product.show', $product) }}" itemprop="name">{{ $product->name }}</a></h3>
                            <p class="subtitle is-6" itemprop="category">{{ $product->category->name }}</p>
                            <div class="content" itemprop="description">
                                {!! $product->blurb ?? $product->description !!}
                                {{-- <a href="#">#css</a> <a href="#">#responsive</a> --}}
                                <br>
                                {{-- <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time> --}}
                            </div>
                            <span class="is-hidden" itemprop="brand">{{ $product->brand->name }}</span>
                            {{-- <span  itemprop="sku"></span> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
