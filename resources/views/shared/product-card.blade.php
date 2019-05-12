<div class="card" itemscope itemtype="http://schema.org/Product">
    <a href="{{ route('product.show', $product->slug) }}" class="card-image" aria-label="Read more about {{ $product->name }}">
        @if($product->tag)
        <span class="tag is-primary">
            {{ $product->tag->name }}
        </span>
        @endif
        <figure class="image is-8by5">
            <img src="{{ $product->getFirstMediaUrl('product-images', 'large') ?? '' }}" alt="{{ $product->name }}">
        </figure>
    </a>
    <div class="card-content">
        <h3 class="title is-5"><a href="{{ route('product.show', $product->slug) }}" itemprop="name">{{ $product->name }}</a></h3>
        <p class="subtitle is-6" itemprop="category">{{ $product->category->name }}</p>
        <div class="content" itemprop="description">
            {!! $product->blurb ?? $product->description !!}
            {{-- <a href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a> --}}
            {{--<br>
             <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time> --}}
        </div>
        <span class="is-hidden" itemprop="brand">{{ $product->brand->name }}</span>
        {{-- <span  itemprop="sku"></span> --}}
    </div>
</div>
