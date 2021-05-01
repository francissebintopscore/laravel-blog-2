@extends('layouts.app')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-body">
                <h2>{{ $blog->title }}</h2>
                @foreach ( $blog->tags as $tag )
                    <span class="badge badge-info">{{ $tag->name }}</span>
                @endforeach
                <div>{{ $blog->body }}</div>
            </div>  
        </div>
        <div class="text-right">
                    @can('update', $blog)
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">Edit</a>
                    @endcan
                    @can('delete', $blog)
                        <form action="/blogs/{{$blog->id}}" method="POST" style="display:inline-block;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
</div>
dd(DB::getQueryLog())}}
@endsection