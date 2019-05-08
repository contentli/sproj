@if ($message = Session::get('success'))
<div class="notification is-success">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        {{ $message }}
    </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="notification is-danger">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        {{ $message }}
    </div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="notification is-warning">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        {{ $message }}
    </div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="notification is-info">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        {{ $message }}
    </div>
</div>
@endif


@if ($errors->any())
<div class="notification is-danger">
    <div class="container">
        <button class="delete is-pulled-right"></button>
        Something went to shit, check for errors..
    </div>
</div>
@endif
