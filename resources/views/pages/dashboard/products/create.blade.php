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
                    <input id="name" name="name" class="input" type="text" value="{{ old('name') }}">
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
                            <label for="category_id" class="label">Category</label>
                            <div class="select is-fullwidth">
                                <select id="category_id" name="category_id">
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

                <!-- Price -->
                <div class="field">
                    <label for="price" class="label">Price</label>
                    <input id="price" name="price" class="input" type="text" value="{{ old('price') }}">
                </div>

                <!-- Blurb -->
                <div class="field">
                    <label for="blurb" class="label">Blurb</label>
                    <textarea class="textarea" id="blurb" name="blurb">{{ old('blurb') }}</textarea>
                </div>

                <!-- Description -->
                <div class="field">
                    <label for="description" class="label">Description</label>
                    <textarea class="textarea" id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <!-- Rating -->
                <div class="field is-grouped">
                    <div class="control is-expanded">
                        <div class="field">
                            <label for="rating" class="label">Rating</label>
                            <input id="rating" name="rating" class="input" type="number" value="{{ old('rating') }}">
                            <p class="help">Rating 0-100</p>
                        </div>
                    </div>
                    <div class="control is-expanded">
                        <div class="field">
                            <label for="rating_count" class="label">Rating count</label>
                            <input id="rating_count" name="rating_count" class="input" type="number" value="{{ old('rating_count') }}">
                            <p class="help">Rating count ex. 5000</p>
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="field">
                    <div class="box">

                        <label for="image" class="label">Product image</label>

                        {{-- <img src="https://via.placeholder.com/150x100" alt="">
                        <img src="https://via.placeholder.com/150x100" alt="">

                        <hr> --}}

                        <div class="field is-grouped">
                            <div class="control is-expanded">
                                <div class="field">
                                    <div class="file has-name is-fullwidth">
                                        <label class="file-label">
                                            <input id="fileinput" class="file-input" type="file" name="image">
                                            <span class="file-cta">
                                                <span class="file-label">
                                                    Choose a file…
                                                </span>
                                            </span>
                                            <span id="filename" class="file-name"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="control is-expanded">
                                <div class="field">
                                    <label for="rating" class="label">Alternative text</label>
                                    <input id="rating" name="rating" class="input" type="text">
                                </div>
                            </div> --}}

                            {{--
                                <div class="control is-aligned-bottom">
                                    <button class="button is-success" id="file_upload">
                                        <span class="icon">
                                            <i class="mdi mdi-18px mdi-upload" aria-hidden="true"></i>
                                        </span>
                                        <span>Upload</span>
                                    </button>
                                </div> --}}

                            </div>
                            <p id="output" class="hidden"></p>

                        </div>

                        <!-- Specs -->
                        <div class="field">
                            <div class="box">
                                <label class="label">Specs</label>

                                <hr>

                                @for ($i = 0; $i < 1; $i++)
                                <div class="field is-grouped">
                                    <div class="control is-expanded">
                                        <div class="field">
                                            <label for="key_{{ $i }}" class="label">Key</label>
                                            <input id="key_{{ $i }}" name="specs[{{ $i }}][key]" class="input" type="text">
                                        </div>
                                    </div>
                                    <div class="control is-expanded">
                                        <div class="field">
                                            <label for="value_{{ $i }}" class="label">Value</label>
                                            <input id="value_{{ $i }}" name="specs[{{ $i }}][value]" class="input" type="text">
                                        </div>
                                    </div>
                                </div>
                                @endfor

                                <div class="control is-aligned-bottom">
                                    <button class="button is-success" id="">
                                        <span class="icon">
                                            <i class="mdi mdi-18px mdi-plus" aria-hidden="true"></i>
                                        </span>
                                        <span>Add more rows</span>
                                    </button>
                                </div>


                            </div>

                        </div>

                        <!-- Links -->
                        <div class="field">
                            <div class="box">
                                <label class="label">Links</label>

                                <hr>

                                @foreach (config('products.regions') as $region)
                                <div class="field is-grouped">

                                    <div class="control">
                                        <div class="field">
                                            <label class="label" for="url_{{ $region }}">{{ $region }}</label>
                                        </div>
                                    </div>

                                    <div class="control is-expanded">
                                        <div class="field">
                                            <input id="url_{{ $region }}" name="links[{{ $region }}]" class="input" type="text" {{ old('links[{$region}]') }}>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                            </div>
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
