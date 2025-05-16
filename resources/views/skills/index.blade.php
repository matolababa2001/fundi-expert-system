@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Skills</h2>

    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Add New Skill</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Skill Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>
                    <a href="{{ route('skills.edit', $skill) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this skill?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
