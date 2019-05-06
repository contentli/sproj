@extends('layouts.app')

@section('title', 'Products - Dashboard')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li><a href="{{ route('dashboard.products') }}" aria-current="page">Products</a></li>
            <li class="is-active"><a href="#" aria-current="page">Delete a product</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Delete product {{ $product->name }}
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.products' ) }}" class="button is-light">
                    <span class="icon">
                        <i class="mdi mdi-18px mdi-chevron-left" aria-hidden="true"></i>
                    </span>
                    <span>Back to list</span>
                </a>
            </p>
        </div>
    </nav>

    <hr>

    <div class="columns">

        <!-- Sidebar -->
        <aside class="column is-3">
            @include('pages.dashboard.shared.sidebar')
        </aside>

        <!-- Main area -->
        <main class="column">

            <h2 class="title is-4">Warning</h2>
            <div class="content">
                <p>This action will permanently destroy this product, you sure?</p>
            </div>

            <!-- Form -->
            <form action="{{ route('dashboard.products.product.destroy', $product) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="field">
                    <button class="button is-danger" type="submit">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-trash-can" aria-hidden="true"></i>
                        </span>
                        <span>Delete {{ $product->name }}</span>
                    </button>
                </div>

            </form>

        </main>
    </div>
</div>
@endsection
