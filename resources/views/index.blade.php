@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
    <div class="container mb-3">
        <h1>Instagram Grabber</h1>
        <div class="msg">
            <div class="lead text-muted">Type in the field below the Instagram tag that you are
                interested and how many pictures you wanna get.</div>
        </div>

        @include('layouts.form')

    </div>
</section>

@endsection
