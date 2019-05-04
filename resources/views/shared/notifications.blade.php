@if ($message = Session::get('success'))
<div class="notification is-success">
    <button class="delete"></button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('error'))
<div class="notification is-danger">
    <button class="delete"></button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('warning'))
<div class="notification is-warning">
    <button class="delete"></button>
    {{ $message }}
</div>
@endif


@if ($message = Session::get('info'))
<div class="notification is-info">
    <button class="delete"></button>
    {{ $message }}
</div>
@endif


@if ($errors->any())
<div class="notification is-danger">
    <button class="delete"></button>
    Something went to shit, check for errors..
</div>
@endif
