@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Skill</h2>

    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Skill Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Skill</button>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
