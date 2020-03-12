@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1>Instagram Grabber</h1>
        <div class="msg">
            <div class="alert alert-danger">{{ $err_msg }}</div>
        </div>

        @include('layouts.form')

    </div>
</section>

@endsection
