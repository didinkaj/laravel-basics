@extends('layouts.main')
@section('content')
    @foreach($allBlogs as $blog)
        <div class="card mb-4">
            <div class="card-header"><a href="{{url('/showblog/'.$blog->id)}}" style="color: brown">{{ $blog->title}} </a></div>

            <div class="card-body">
                @if (strlen($blog->body)>300))
                {{ substr($blog->body,0,300)}}
                <a href="{{url('/showblog/'.$blog->id)}}" class=" "> ... Read more</a>
                @else
                    {{ $blog->body}}
                @endif
            </div>

        </div>
    @endforeach
    {{ $allBlogs->links() }}
@endsection
