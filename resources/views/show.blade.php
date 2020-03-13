@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1>Instagram Grabber</h1>
        <div class="msg">
            <div class="lead text-muted">That's what we have found for you. If you want more, try again.</div>
        </div>

        @include('layouts.form')

    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach ($links_list as $insta_link => $img_src)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="image-container">
                        <img class="card-img-top" src="{{ $img_src }}">
                    </div>
                    <div class="card-body">
                        <div class="btn-group d-flex justify-content-between align-items-center">
                            <a href="{{ $insta_link }}" target="_blank" role="button" class="btn btn-secondary">View on Instagram</a>
                            <button type="button" id="fav" class="btn btn-outline-secondary">Add to
                                favorite</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
