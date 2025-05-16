@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Skill</h1>

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Skill Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Skill</button>
    </form>
</div>
@endsection
