<form action="/search" method="get">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">#</span>
        </div>
        <input type="text" class="form-control" placeholder="tag" aria-label="tag" aria-describedby="basic-addon1"
            value="{{ $tag ?? '' }}" id="tag" name="tag">
        <div class="input-group-append">
            <select class="form-control text-center" name="number">
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
    <small id="emailHelp" class="form-text text-muted mb-3">We'll never share what you type here with anyone
        else.</small>
    <button type="submit" class="btn btn-primary">Let's search on Instagram</button>
    <a href="/favorites" class="btn btn-outline-primary" role="button">Show favorites pictures</a>
</form>
