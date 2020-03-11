@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1>Instagram Grabber</h1>
    <form action="/search" method="get">
      <div class="form-group">
        <label class="lead text-muted" for="tag">Type in the field below the Instagram tag that you are interested and how many pictures you wanna get.</label>
        @if ($error_warning)
            <div class="alert alert-danger">{{ $error_warning }} <em>{{ $tag }}</em></div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <input class="form-control form-control-lg text-center" type="text" placeholder="Type here something you are interested in" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type here something you are interested in'" id="tag" name="tag" value="{{ $tag ?? '' }}">
            </div>
            <div class="col-md-2">
                <select class="form-control form-control-lg text-center" name="number">
                    <option value="9" {{ $number == 9 ? 'selected' : ''}}>9</option>
                    <option value="12" {{ $number == 12 ? 'selected' : ''}}>12</option>
                    <option value="15" {{ $number == 15 ? 'selected' : ''}}>15</option>
                    <option value="18" {{ $number == 18 ? 'selected' : ''}}>18</option>
                    <option value="21" {{ $number == 21 ? 'selected' : ''}}>21</option>
                    <option value="24" {{ $number == 24 ? 'selected' : ''}}>24</option>
                    <option value="27" {{ $number == 27 ? 'selected' : ''}}>27</option>
                    <option value="30" {{ $number == 30 ? 'selected' : ''}}>30</option>
                </select>
            </div>
        </div>
        <small id="emailHelp" class="form-text text-muted">We'll never share what you type here with anyone else.</small>
      </div>
      <button type="submit" class="btn btn-primary">Let's search on Instagram</button>
    </form>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
        @if (!$error_warning)
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
