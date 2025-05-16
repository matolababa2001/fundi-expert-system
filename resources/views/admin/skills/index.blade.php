@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Skills</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Add New Skill</a>

    @if($skills->count())
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
                            <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No skills found.</p>
    @endif
</div>
@endsection
