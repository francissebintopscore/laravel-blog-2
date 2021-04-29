@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <form action="/blogs/" method="POST">
            @csrf

            @include('blogs.form')

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>

        </form>
    </div>
    </div>
</div>
@endsection