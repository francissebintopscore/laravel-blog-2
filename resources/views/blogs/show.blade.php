@extends('layouts.app')
@section('content')
<div class="container">
        <div class="card">
            <div class="card-body">
                <h2>{{ $blog->title }}</h2>
                <span class="badge badge-info">{{ $blog->user->name }}</span>
                <div>{{ $blog->body }}</div>
            </div>  
        </div>
        <div class="text-right">
                    @can('create', App\Models\Blog::class)
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">Edit</a>
                    @endcan
                        <form action="/blogs/{{$blog->id}}" method="POST" style="display:inline-block;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                </div>
</div>
dd(DB::getQueryLog())}}
@endsection