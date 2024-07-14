<div>
    <form action="{{ route('feed.comments.create', $feed->id ) }}" method="POST"> 
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>

        <hr>
        @foreach ($feed->comment as $comment)
                
            
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{$comment->user->getImageUrl()}}"
                {{-- {{$feed->comment->user->name}}"  --}}
                alt="Luigi Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">
                        {{$comment->user_name}}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> {{$comment->created_at}}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{$comment->content}}
                </p>
            </div>
        </div>
        @endforeach
    </form>
</div>
