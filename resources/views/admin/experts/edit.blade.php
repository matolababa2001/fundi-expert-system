@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Expert</h1>

    <form action="{{ route('experts.update', $expert->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.experts.partials.form', ['expert' => $expert])

        <button type="submit" class="btn btn-success">Update Expert</button>
    </form>
</div>
@endsection
