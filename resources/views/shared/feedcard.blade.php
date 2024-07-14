<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                        src="{{$feed->user->getImageUrl()}}" alt="{{ $feed->user->name }}">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{route('user.show', $feed->user->id)}}"> {{ $feed->user->name }}
                            </a></h5>
                    </div>
                </div>
                <div>


                   <div class="d-flex">

                    @auth
                    @if ($feed->user->id === Auth::user()->id)
                        
                            <a class="mx-2" href="{{ route('feed.edit', $feed->id) }}">edit</a>
                        <a href="{{ route('feed.show', $feed->id) }}">view</a>
                        
                        <form  method="POST" action="{{ route('feed.destroy', $feed->id) }}">
                            @csrf
                            @method('delete')
                            <button class="ms-1 btn btn-danger btn-sm p-10">X</button>
                        @else
                        
                            <a href="{{ route('feed.show', $feed->id) }}">view</a>
                            
                    @endif
                @endauth

                   </div>
                    @guest
                    <a href="{{ route('feed.show', $feed->id) }}">view</a>
                    @endguest

                    </form>




                </div>


            </div>

        </div>





        <div class="card-body">
            @if ($editing ?? false)
                <form action="{{ route('feed.update', $feed->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $feed->content }}</textarea>
                        @error('content')
                            <span class="d-block fs-6 text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        @if ($editing ?? false)
                            <button type="submit" class="btn btn-dark mb-2"> Edit </button>
                        @else
                            <button type="submit" class="btn btn-dark mb-2"> Share </button>
                        @endif
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $feed->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                @include('shared.like')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ date($feed->created_at) }} </span>
                </div>
            </div>
            @include('shared.comments')
        </div>
    </div>

</div>
