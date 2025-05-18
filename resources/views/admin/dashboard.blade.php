@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="mb-3">
        <a href="{{ route('admin.skills.index') }}" class="btn btn-primary">Manage Skills</a>
    </div>
    <div>
        <a href="{{ route('admin.experts.index') }}" class="btn btn-secondary">Manage Experts</a>
    </div>
</div>
@endsection
