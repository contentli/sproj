@extends('layouts.app')

@section('title', $product->name)
@section('meta_description', $product->blurb ?? $product->name)
@section('meta_title', $product->name)
@section('meta_type', 'website')
@section('meta_url', route('product.show', $product->slug))
@section('meta_image', asset($product->getFirstMediaUrl('product-images')))

@section('content_top')
@if(!$product->isPublished())
<div class="notification is-warning">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        This product is not published
    </div>
</div>
@endif
@endsection

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
                    <div class="is-relative">
                        @if($product->tag)
                        <span class="tag is-primary is-absolute-right">
                            {{ $product->tag->name }}
                        </span>
                        @endif
                        <div>
                            <lingallery
                            :width="800"
                            :height="500"
                            :responsive=true
                            :mobile-height="200"
                            base-color="#ffffff"
                            accent-color="#307cc4"
                            left-control-class="mdi mdi-chevron-left-box"
                            right-control-class="mdi mdi-chevron-right-box"
                            :items="[
                            @foreach ($images as $image)
                            {src: '{{ $image->getUrl('product') }}', thumbnail: '{{ $image->getUrl('thumb') }}'},
                            @endforeach
                            ]"/>
                        </div>
                    </div>
                    {{-- <figure class="image">
                        @foreach ($images as $image)
                        <img src="{{ $image->getUrl('medium') }}" alt="{{ $image->name }}" itemprop="image">
                        @endforeach
                    </figure> --}}
                    <hr>

                    <div id="amzn-assoc-ad-3cf9d825-a75c-46f9-a091-97f25fe629c0"></div>
                    <script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3cf9d825-a75c-46f9-a091-97f25fe629c0" type="application/javascript"></script>

                    @if($product->specs)
                    <ul class="list">
                        @foreach ($product->specs as $value)
                        <li>
                            <span class="label">{{ $value['label'] }}</span>
                            <span class="value">{{ $value['value'] }}</span>
                        </li>
                        @endforeach
                    </dl>
                    @endif
                </div>
                <div class="column">
                    <h1 class="title mb-05" itemprop="name">{{ $product->name }}</h1>
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="subtitle is-5">by <span itemprop="brand">{{ $product->brand->name }}</span></p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <small class="rating is-pulled-right">
                                    <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                        <span itemprop="ratingValue">{{ $product->rating }}</span>
                                        out of <span itemprop="bestRating">100</span>
                                        based on <span itemprop="ratingCount">{{ $product->rating_count ?? '0'}}</span> user ratings
                                    </span>
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <span class="is-hidden" itemprop="category">{{ $product->category->name}}</span>
                    <div class="content" itemprop="description">
                        {!! $product->description !!}
                    </div>
                    <hr>

                    <div class="level mb-1">
                        <div class="level-left">
                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <p class="heading">List price</p>
                                <p class="subtitle is-bold is-3">
                                    <span itemprop="priceCurrency" content="USD">$</span>
                                    <span itemprop="price" content="{{ $product->price }}">{{ $product->price }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                @if($product->links)
                                @foreach ($product->links as $key => $url)
                                @if($url != null)
                                <a href="{{ $url }}" class="button is-product-cta-button">
                                    <span class="icon is-medium">
                                        <i class="mdi mdi-amazon"></i>
                                    </span>
                                    <span>Check my current price</span>
                                </a>
                                @endif
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                </div>
            </div>

            @if(count($product->related()) != 0)
                <h2 class="title is-4">Related products</h2>
                <div class="columns is-multiline">

                    @foreach ($product->related() as $product)
                    <div class="column is-4 is-6-tablet is-4-desktop is-3-widescreen">
                        @include('shared.product-card', $product)
                    </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>
</div>
@endsection
