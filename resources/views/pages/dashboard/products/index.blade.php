@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li class="is-active"><a href="#" aria-current="page">Products</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Products
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.products.product.create' ) }}" class="button is-medium is-success">
                    <span class="icon">
                        <i class="mdi mdi-18px mdi-plus" aria-hidden="true"></i>
                    </span>
                    <span>Create new product</span>
                </a>
            </p>
        </div>
    </nav>

    <hr>

    <div class="columns">

        <!-- Sidebar -->
        <aside class="column is-narrow">
            @include('pages.dashboard.shared.sidebar')
        </aside>

        <!-- Main area -->
        <main class="column">

            <!-- Header -->
            <nav class="level">

                <!-- Left side -->
                <div class="level-left">
                    <div class="level-item">
                        <p class="subtitle is-4">
                            <strong>{{ $products->total() }}</strong> products
                        </p>
                    </div>
                    <div class="level-item">
                        <form action="{{ route('dashboard.products.search') }}" method="POST">
                            <div class="field has-addons">
                                @csrf
                                <p class="control">
                                    <input class="input" type="text" name="query" placeholder="Find a product">
                                </p>
                                <p class="control">
                                    <button class="button" type="submit">
                                        <span class="icon">
                                            <i class="mdi mdi-18px mdi-magnify" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right side -->
                <div class="level-right">
                    <p class="level-item">
                        <a href="?filter=none">
                            {!! (Request::get('filter') == 'none' || is_null(Request::get('filter'))) ? '<strong>All</strong>' : 'All' !!}
                        </a>
                    </p>
                    <p class="level-item">
                        <a href="?filter=published">
                            {!! (Request::get('filter') == 'published') ? '<strong>Published</strong>' : 'Published' !!}
                        </a>
                    </p>
                    <p class="level-item">
                        <a href="?filter=draft">
                            {!! (Request::get('filter') == 'draft') ? '<strong>Drafts</strong>' : 'Drafts' !!}
                        </a>
                    </p>
                    <p class="level-item">
                        <a href="?filter=deleted">
                            {!! (Request::get('filter') == 'deleted') ? '<strong>Deleted</strong>' : 'Deleted' !!}
                        </a>
                    </p>
                </div>
            </nav>

            <!-- Table -->
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Updated</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Updated</th>
                        <th>Published</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ route('dashboard.products.product.show', $product) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>{{ $product->published_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <!-- Pagination -->
            {{ $products->appends(['filter' => $filter])->links() }}

        </main>
    </div>
</div>
@endsection