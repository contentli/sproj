@extends('layouts.app')

@section('title', 'Templates - Dashboard')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li class="is-active"><a href="#" aria-current="page">Templates</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Templates
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.templates.template.create' ) }}" class="button is-medium is-success">
                    <span class="icon">
                        <i class="mdi mdi-18px mdi-plus" aria-hidden="true"></i>
                    </span>
                    <span>Create new template</span>
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
                            <strong>{{ $templates->total() }}</strong> templates
                        </p>
                    </div>
                </div>
            </nav>

            <!-- Table -->
            <table class="table is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Updated</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($templates as $template)
                    <tr>
                        <td>
                            <span {{-- href="{{ route('dashboard.brands.brand.show', $brand) }}" --}}>
                                {{ $template->category->name }}
                            </span>
                        </td>
                        <td>{{ $template->updated_at }}</td>
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
                                        <a href="{{ route('dashboard.templates.template.edit', $template) }}" class="dropdown-item">
                                            <span class="icon">
                                                <i class="mdi mdi-18px mdi-pencil" aria-hidden="true"></i>
                                            </span>
                                            <span>Edit</span>
                                        </a>
                                        <a href="{{ route('dashboard.templates.template.delete', $template) }}" class="dropdown-item">
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
            {{ $templates->links() }}

        </main>
    </div>
</div>
@endsection
