@auth
    <h4> Share yours feeds </h4>
    <div class="row">
        <form action="{{ route('feed.create') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('feeds')
                    <span class="d-block fs-6 text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4>
        <a href="{{ route('login') }}">Login</a>
        To Share your feeds
    </h4>

@endguest
