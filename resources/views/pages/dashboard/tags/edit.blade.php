@extends('layouts.app')

@section('title', 'Tags - Dashboard')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li><a href="{{ route('dashboard.tags') }}" aria-current="page">Tags</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit a tag</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Edit {{ $tag->name }}
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.tags' ) }}" class="button is-light">
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

            <!-- Form -->
            <form action="{{ route('dashboard.tags.tag.update', $tag) }}" method="post" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="field">
                    <label for="name" class="label">Name</label>
                    <input id="name" name="name" class="input" type="text" value="{{ old('name', $tag->name) }}">
                </div>

                <div class="field">
                    <button class="button is-medium is-success" type="submit">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-pencil" aria-hidden="true"></i>
                        </span>
                        <span>Edit tag</span>
                    </button>
                </div>

            </form>

        </main>
    </div>
</div>
@endsection
