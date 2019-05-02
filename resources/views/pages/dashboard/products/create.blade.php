@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
            <li><a href="{{ route('dashboard') }}" aria-current="page">Dashboard</a></li>
            <li><a href="{{ route('dashboard.products') }}" aria-current="page">Products</a></li>
            <li class="is-active"><a href="#" aria-current="page">Create a product</a></li>
        </ul>
    </nav>

    <!-- Title area -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">
                    Create a product
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

            <!-- Form -->
            <form action="{{ route('dashboard.products.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <input id="name" name="name" class="input" type="text">
                </div>

                <!-- Slug -->
                <div class="field">
                    <a href="#" class="is-pulled-right"><small>Edit?</small></a>
                    <label for="slug" class="label">Slug</label>
                    <input id="slug" name="slug" class="input" type="text" disabled>
                </div>

                <!-- Category and brand -->
                <div class="field is-grouped">
                    <div class="control is-expanded">
                        <div class="field">
                            <!-- Category -->
                            <label for="parent_id" class="label">Category</label>
                            <div class="select is-fullwidth">
                                <select id="parent_id" name="parent_id">
                                    <option value="">None</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        @if($category->parent)
                                        - {{ $category->name }}
                                        @else
                                        {{ $category->name }}
                                        @endif
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="control is-expanded">
                        <div class="field">
                            <!-- Brand -->
                            <label for="brand_id" class="label">Brand</label>
                            <div class="select is-fullwidth">
                                <select id="brand_id" name="brand_id">
                                    <option value="">None</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="field">
                    <div class="box">

                        <label for="image" class="label">Images</label>

                        <img src="https://via.placeholder.com/150x100" alt="">
                        <img src="https://via.placeholder.com/150x100" alt="">

                        <hr>

                        <div class="field is-grouped">
                            <div class="control is-expanded">

                                <div class="field">
                                    <label for="image" class="label">File</label>
                                    <div class="file has-name is-fullwidth">
                                        <label class="file-label">
                                            <input id="image" class="file-input" type="file" name="image">
                                            <span class="file-cta">
                                                <span class="file-label">
                                                    Choose a file…
                                                </span>
                                            </span>
                                            <span class="file-name">
                                                Screen Shot 2017-07-29 at 15.54.25.png
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="control is-expanded">
                                <div class="field">
                                    <label for="rating" class="label">Alternative text</label>
                                    <input id="rating" name="rating" class="input" type="text">
                                </div>
                            </div>

                            <div class="control is-aligned-bottom">
                                <button class="button is-success">
                                    <span class="icon">
                                        <i class="mdi mdi-18px mdi-upload" aria-hidden="true"></i>
                                    </span>
                                    <span>Upload</span>
                                </button>
                            </div>

                        </div>

                    </div>

                    <!-- Rating -->
                    <div class="field">
                        <label for="rating" class="label">Rating</label>
                        <input id="rating" name="rating" class="input" type="number">
                        <p class="help">Rating 0-100</p>
                    </div>

                    <!-- Description -->
                    <div class="field">
                        <label for="description" class="label">Description</label>
                        <textarea class="textarea" id="description" name="description"></textarea>
                    </div>

                    <!-- Specs -->
                    <div class="field">
                        <label for="name" class="label">Specs</label>
                        <input id="name" name="name" class="input" type="text">
                    </div>

                    <!-- Links -->
                    <div class="field">
                        <label for="name" class="label">Links</label>
                        <input id="name" name="name" class="input" type="text">
                    </div>

                    <!-- Buttons -->
                    <div class="field">
                        <button class="button is-medium is-success" type="submit">
                            <span class="icon">
                                <i class="mdi mdi-18px mdi-plus" aria-hidden="true"></i>
                            </span>
                            <span>Create new product</span>
                        </button>
                    </div>

                </form>

            </main>
        </div>
    </div>
    @endsection
