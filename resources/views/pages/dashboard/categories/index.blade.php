@extends('layouts.app')

@section('title', 'Categories - Dashboard')

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
        <aside class="column is-3">
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
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Description</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Description</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('dashboard.categories.category.show', $category) }}">
                                @if ($category->parent)
                                <span class="icon">
                                    <i class="mdi mdi-18px mdi-subdirectory-arrow-right" aria-hidden="true"></i>
                                </span>
                                @endif
                                {{ $category->name }}
                            </a>
                        </td>
                        <td>{{ $category->parent->name ?? '' }}</td>
                        <td>{!! $category->description !!}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td class="has-text-right">
                            <div class="dropdown is-hoverable is-right">
                                <div class="dropdown-trigger">
                                    <button class="button is-light is-small" aria-haspopup="true" aria-controls="dropdown-menu">
                                        <span class="icon">
                                            <i class="mdi mdi-18px mdi-dots-vertical" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                    <div class="dropdown-content">
                                        <a href="{{ route('dashboard.categories.category.edit', $category) }}" class="dropdown-item">
                                            <span class="icon">
                                                <i class="mdi mdi-18px mdi-pencil" aria-hidden="true"></i>
                                            </span>
                                            <span>Edit</span>
                                        </a>
                                        <a href="{{ route('dashboard.categories.category.delete', $category) }}" class="dropdown-item">
                                            <span class="icon">
                                                <i class="mdi mdi-18px mdi-trash-can" aria-hidden="true"></i>
                                            </span>
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
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
