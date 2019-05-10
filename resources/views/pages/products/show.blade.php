@extends('layouts.app')

@section('title', $product->name)

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

            <div class="columns is-8 is-variable">
                <div class="column is-6">
                    @if($product->tag)
                    <span class="tag is-primary is-pulled-right">
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
                                {src: '{{ $image->getUrl('large') }}', thumbnail: '{{ $image->getUrl('thumb') }}'},
                            @endforeach
                        ]"/>
                    </div>
                    <hr>

                    <div id="amzn-assoc-ad-3cf9d825-a75c-46f9-a091-97f25fe629c0"></div>
                    <script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3cf9d825-a75c-46f9-a091-97f25fe629c0" type="application/javascript"></script>

                    {{-- <figure class="image">
                        @foreach ($images as $image)
                            <img src="{{ $image->getUrl('medium') }}" alt="{{ $image->name }}" itemprop="image">
                        @endforeach
                    </figure> --}}
                </div>
                <div class="column">
                    <h1 class="title is-marginless" itemprop="name">{{ $product->name }}</h1>
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="subtitle is-5">by <span itemprop="brand">{{ $product->brand->name }}</span></p>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <small class="rating is-pulled-right">Rating:
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

                    <div class="level is-mobile">
                        <div class="level-left">
                            <div class="level-item" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
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
                                                <span>Get this product</span>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                    <iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=13&l=ur1&category=gift_certificates&banner=180TQ0K9X17QCCZQS4R2&f=ifr&linkID=dbdf03a55473b1d4b38ec2a4eb249c15&t=leetmark-20&tracking_id=leetmark-20" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
                </div>
            </div>
            {{-- {{ $product->links }} --}}
        </main>
    </div>
</div>
@endsection
