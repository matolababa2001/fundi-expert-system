@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Skill</h1>

    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Skill Name</label>
            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Skill</button>
    </form>
</div>
@endsection
