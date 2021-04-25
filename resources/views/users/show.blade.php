@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$user->name}}</h1>

    @foreach ($blogs as $blog)
        <div class="card">
            <div class="card-body">
                <h2>
                    <a href="/blogs/{{$blog->id}}">
                        {{ $blog->title }}
                    </a>
                </h2>
                <span class="badge badge-info">{{ $user->email }}</span>
                <div>{{ $blog->id }}</div>
            </div>  
        </div>
    @endforeach
</div>

{{ $blogs->links() }}
@endsection