@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li class="is-active"><a href="#" aria-current="page">Categories</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Categories
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.categories.category.create' ) }}" class="button is-medium is-success">
                    <span class="icon">
                        <i class="mdi mdi-18px mdi-plus" aria-hidden="true"></i>
                    </span>
                    <span>Create new category</span>
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
                            <strong>{{ $categories->total() }}</strong> categories
                        </p>
                    </div>
                    <div class="level-item">
                        <form action="{{ route('dashboard.categories.search') }}" method="POST">
                            <div class="field has-addons">
                                @csrf
                                <p class="control">
                                    <input class="input" type="text" name="query" placeholder="Find a category">
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
            </nav>

            <!-- Table -->
            <table class="table is-striped is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Updated</th>
                        <th>Published</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Updated</th>
                        <th>Published</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('dashboard.categories.category.show', $category) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->parent->name ?? '' }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>{{ $category->published_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <!-- Pagination -->
            {{ $categories->links() }}

        </main>
    </div>
</div>
@endsection
