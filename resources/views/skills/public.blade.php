@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Explore Available Skills</h2>

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('skills.public') }}" class="mb-5">
        <div class="input-group">
            <input 
                type="text" 
                name="search" 
                class="form-control form-control-lg" 
                placeholder="Search skills..." 
                value="{{ request('search') }}"
            >
            <button class="btn btn-primary btn-lg" type="submit">Search</button>
        </div>
    </form>

    {{-- Skills Grid --}}
    <div class="row">
        @forelse ($skills as $skill)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">{{ $skill->name }}</h5>
                        <p class="card-text text-muted">ID: {{ $skill->id }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No skills found. Try a different search.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
