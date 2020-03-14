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
            @foreach ($image_list as $image)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="image-container">
                        <img class="card-img-top" src="{{ $image->url }}">
                    </div>
                    
                    <div class="card-body">
                        <div class="btn-group d-flex justify-content-between align-items-center">
                            <a href="{{ $image->url_inst }}" target="_blank" role="button" class="btn btn-secondary">Instagram</a>
                            <form>
                                <input type="hidden" class="img_src" name="url" value="{{ $image->url }}">
                                <input type="hidden" class="insta_link" name="url_inst" value="{{ $image->url_inst }}">
                                {{ csrf_field() }}
                                <button type="submit" class="like btn btn-outline-secondary d-none">Add to
                                favorite</button>
                                <button type="submit" class="dislike btn btn-outline-secondary">Remove from
                                favorite</button>
                            </form>
                        </div>     
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
