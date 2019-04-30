@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-narrow">
            <aside class="menu">
                <p class="menu-label">Product categories</p>
                <ul class="menu-list">
                    {!! $menu !!}
                </ul>
            </aside>
        </div>
    </div>
</div>
@endsection
