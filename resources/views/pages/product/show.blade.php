@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        {{-- <aside class="column is-2">
            <nav class="menu">
                Menu?
            </nav>
        </aside> --}}
        <main class="column" itemscope itemtype="http://schema.org/Product">
            <div class="columns">
                <div class="column is-6">
                    <figure class="image">
                        @foreach ($images as $image)
                            <img src="{{ $image->getUrl('medium') }}" alt="{{ $image->name }}" itemprop="image">
                        @endforeach
                    </figure>
                </div>
                <div class="column">
                    <h1 class="title is-marginless" itemprop="name">{{ $product->name }}</h1>
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="subtitle is-5" itemprop="brand">{{ $product->brand->name }}</p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <small class="rating is-pulled-right">Rating:
                                    <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                        <span itemprop="ratingValue">{{ $product->rating }}</span>
                                        out of <span itemprop="bestRating">100</span>
                                        based on <span itemprop="ratingCount">500</span> user ratings
                                    </span>
                                </small>
                            </div>
                        </div>
                    </div>
                    <span class="is-hidden" itemprop="category">{{ $product->category->name}}</span>
                    <div class="content" itemprop="description">
                        {{ $product->description }}
                    </div>
                    @foreach ($product->links as $key => $url)
                        @if($url != null)
                            <a href="{{ $url }}" class="button is-primary is-large is-expanded">
                                <span class="icon is-medium">
                                    <i class="mdi mdi-amazon"></i>
                                </span>
                                <span>Buy this item in {{ $key }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            {{-- {{ $product->links }} --}}
        </main>
    </div>
</div>
@endsection
