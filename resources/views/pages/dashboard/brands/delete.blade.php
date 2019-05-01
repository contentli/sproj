@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li><a href="{{ route('dashboard.brands') }}" aria-current="page">Brands</a></li>
            <li class="is-active"><a href="#" aria-current="page">Delete a brand</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Delete brand {{ $brand->name }}
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.brands' ) }}" class="button is-light">
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
        <aside class="column is-narrow">
            @include('pages.dashboard.shared.sidebar')
        </aside>

        <!-- Main area -->
        <main class="column">

            <h2 class="title is-4">Warning</h2>
            <div class="content">
                <p>This action will permanently destroy this brand, you sure?</p>
            </div>

            <!-- Form -->
            <form action="{{ route('dashboard.brands.brand.destroy', $brand) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="field">
                    <button class="button is-danger" type="submit">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-trash-can" aria-hidden="true"></i>
                        </span>
                        <span>Delete {{ $brand->name }}</span>
                    </button>
                </div>

            </form>

        </main>
    </div>
</div>
@endsection