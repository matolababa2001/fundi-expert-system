@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Available Skills</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('skills.public') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search skills...">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @if($skills->isEmpty())
        <div class="alert alert-warning">No skills found.</div>
    @else
        <ul class="list-group">
            @foreach($skills as $skill)
                <li class="list-group-item">{{ $skill->name }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
