@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Skill</h2>

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save Skill</button>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
