@extends('layouts.app')

@section('title', 'Templates - Dashboard')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li><a href="{{ route('dashboard.templates') }}" aria-current="page">Templates</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit a template</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Edit {{ $template->category->name }}
                </h1>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('dashboard.templates' ) }}" class="button is-light">
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
            <form action="{{ route('dashboard.templates.template.update', $template) }}" method="post" autocomplete="off">
                @csrf
                @method('PUT')

                <!-- Category -->
                <div class="field">
                    <label for="category_id" class="label">Category</label>
                    <div class="select is-fullwidth">
                        <select id="category_id" name="category_id">
                            <option value="">None</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('name', $category->id) == $template->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Content -->
                <div class="field">
                    <label for="content" class="label">Content</label>
                    @for ($i = 0; $i < 20; $i++)

                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <div class="field">
                                <!-- Label -->
                                <label for="label_{{ $i }}" class="label">Label</label>
                                <input class="input" type="text" name="content[{{ $i }}][label]" id="label_{{ $i }}" value="{{ old('content[{$i}][label]', $template->content[$i]['label'] ?? '') }}">
                            </div>
                        </div>
                        <div class="control is-expanded">
                            <div class="field">
                                <!-- Key -->
                                <label for="key_{{ $i }}" class="label">Key</label>
                                <input class="input" type="text" name="content[{{ $i }}][key]" id="key_{{ $i }}" value="{{ old('content[{$i}][key]', $template->content[$i]['key'] ?? '') }}">
                            </div>
                        </div>
                        <div class="control is-expanded">
                            <div class="field">
                                <!-- Type -->
                                <label for="type_{{ $i }}" class="label">Type</label>
                                <input class="input" type="text" name="content[{{ $i }}][type]" id="type_{{ $i }}" value="{{ old('content[{$i}][type]', $template->content[$i]['type'] ?? '') }}">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="field">
                    <button class="button is-medium is-success" type="submit">
                        <span class="icon">
                            <i class="mdi mdi-18px mdi-pencil" aria-hidden="true"></i>
                        </span>
                        <span>Edit template</span>
                    </button>
                </div>

            </form>

        </main>
    </div>
</div>
@endsection
