@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1>Instagram Grabber</h1>
    <form action="/" method="get">
      <div class="form-group">
        <label class="lead text-muted" for="tag">Type in the field below the Instagram tag that you are interested.</label>
        @if ($error_warning))
            <div class="alert alert-danger">{{ $error_warning }} <em>{{ $tag }}</em></div>
        @endif
        <input class="form-control form-control-lg text-center" type="text" placeholder="Type here something you are interested in" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type here something you are interested in'" id="tag" name="tag" value="{{ $tag ?? '' }}">
        <small id="emailHelp" class="form-text text-muted">We'll never share what you type here with anyone else.</small>
      </div>
      <button type="submit" class="btn btn-primary">Let's search on Instagram</button>
    </form>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
        @if ($tag)
            @foreach ($urls as $url)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="image-container">
                        <img class="card-img-top" src="{{ $url }}">
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
  </div>
</div>

@endsection
