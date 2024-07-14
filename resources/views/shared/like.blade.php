<div>
   <form action="{{route('feeds.like', $feed->id)}}" method="POST">
    @csrf
    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
    </span> {{ $feed->likes()->count() }} </a>
   </form>
</div>