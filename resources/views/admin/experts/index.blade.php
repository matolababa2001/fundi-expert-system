@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Experts</h1>
    <a href="{{ route('experts.create') }}" class="btn btn-primary mb-3">Add New Expert</a>

    @if($experts->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Skills</th>
                    <th>Certificate</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experts as $expert)
                    <tr>
                        <td>{{ $expert->name }}</td>
                        <td>{{ $expert->location }}</td>
                        <td>
                            @foreach($expert->skills as $skill)
                                <span class="badge bg-info text-dark">{{ $skill->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($expert->certificate)
                                <a href="{{ asset('storage/' . $expert->certificate) }}" target="_blank">View</a>
                            @endif
                        </td>
                        <td>
                            @if($expert->photo)
                                <img src="{{ asset('storage/' . $expert->photo) }}" width="50" height="50" alt="Expert Photo">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('experts.edit', $expert->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No experts found.</p>
    @endif
</div>
@endsection
