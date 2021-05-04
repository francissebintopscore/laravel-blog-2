@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    @can('create', App\Models\Blog::class)
                        <a href="/blogs/create" class="btn btn-success">{{__('buttons.Create')}}</a>
                    @endcan
    </div>
    @foreach ($blogs as $blog)
        <div class="card">
            <div class="card-body">
                <h2>
                    <a href="/blogs/{{$blog->id}}">
                        {{ $blog->title }}
                    </a>
                </h2>
                <span class="badge badge-info">{{ $blog->user->name }}</span>
                <div>{{ $blog->body }}</div>
                <div class="text-right">
                    @can('update', $blog)
                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-warning">{{__('buttons.Edit')}}</a>
                    @endcan
                    @can('delete', $blog)
                        <form action="/blogs/{{$blog->id}}" method="POST" style="display:inline-block;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">{{__('buttons.Delete')}}</button>
                        </form>
                    @endcan
                </div>
            </div>  
        </div>
    @endforeach
</div>

{{ $blogs->withQueryString()->links() }}
 $blogs->links()
dd(DB::getQueryLog())}}
@endsection
