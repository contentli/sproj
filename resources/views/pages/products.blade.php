@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <aside class="column is-3">
            <nav class="menu">
                <p class="menu-label">Product categories</p>
                <ul class="menu-list">
                    {!! $categories_menu !!}
                </ul>
            </nav>
        </aside>
        <main class="column">
            <h1 class="title" itemprop="name">{{ $category->name }}</h1>
            {{-- <p class="subtitle" itemprop="description">A curated list of only the best and popular products</p> --}}
            <hr>
            @if(count($products) > 1)
                <div class="columns is-multiline">
                    @foreach ($products as $product)
                    <div class="column is-4">
                        @include('shared.product-card', $product)
                    </div>
                    @endforeach
                </div>
            @else
                <p>Nothing here yet, try another category</p>
            @endif
            <hr>
            {{ $products->links() }}

        </main>
    </div>
</div>
@endsection
