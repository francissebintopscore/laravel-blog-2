@extends('layouts.app')
@section('content')
<div class="container">

    @foreach ($users as $user)
        <div class="card">
            <div class="card-body">
                <h2>
                    <a href="/users/{{$user->id}}">
                        {{ $user->name }}
                    </a>
                </h2>
                <span class="badge badge-info">{{ $user->email }}</span>
                <span>User id = {{ $user->id }}</span>
            </div>  
        </div>
    @endforeach
</div>

{{ $users->withQueryString()->links() }}
@endsection