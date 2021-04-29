@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <form action="/blogs/{{$blog->id}}" method="POST">
            @csrf
            @method('PUT')

            @include('blogs.form')

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
    </div>
</div>
@endsection