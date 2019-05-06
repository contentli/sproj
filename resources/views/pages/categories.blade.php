@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <main class="column is-12">
            <h1 class="title" itemprop="name">Product categories</h1>
            {{-- <p class="subtitle" itemprop="description">A curated list of only the best and popular products</p> --}}
            <hr>
            @if(count($categories) > 1)
                <div class="columns is-multiline">
                    @foreach ($categories as $category)
                    <div class="column is-4">
                        <div class="box">
                            <h2 class="title is-5">
                                <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </h2>
                            <div class="content">
                                {!! $category->description !!}
                            </div>
                            <a class="button is-primary" href="{{ route('category.show', $category->slug) }}">View products in {{ $category->name }}</a>

                            {{-- <p>Product count: {{ count($category->products) }} </p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p>Nothing here yet, try another category</p>
            @endif
            <hr>
            {{-- {{ $categories->links() }} --}}

        </main>
    </div>
</div>
@endsection
