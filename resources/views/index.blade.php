@extends ('layouts.master')

@section ('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1>Instagram Grabber</h1>
    <form>
      <div class="form-group">
        <label class="lead text-muted" for="tag">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</label>
        <input class="form-control form-control-lg text-center" type="text" placeholder="Type here something you are interested in" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Type here something you are interested in'" id="tag" name="tag">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <button type="submit" class="btn btn-primary">Let's search on Instagram</button>
    </form>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">

      @for ($i = 1; $i < 10; $i++)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      @endfor

    </div>
  </div>
</div>

@endsection
