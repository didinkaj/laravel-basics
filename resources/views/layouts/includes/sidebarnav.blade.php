<div class="card rounded-0">
    <div class="card-header">Quick Links</div>
    <ul class="list-group">
        <li class="list-group-item"><a href="{{url('/addBlog')}}">Add blog</a></li>
        <li class="list-group-item"><a href="{{url('/home')}}">Published blogs <span class="badge float-right">{{count($allBlogsForAll)}}</span> </a></li>
        <li class="list-group-item"><a href="#">Registered users <span class="badge float-right">{{ $allusersno }}</span></a></li>

    </ul>
</div>
<div class="card mt-4 rounded-0 ">
    <div class="card-header">Recently Added</div>
    <ul class="list-group">
        @foreach($allBlogsForAll as  $blog)
        <li class="list-group-item"><a href="{{url('/blog/'.$blog->id)}}">{{$blog->title}}</a></li>
            @endforeach

    </ul>
</div>
