@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Expert</h1>

    <form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.experts.partials.form')

        <button type="submit" class="btn btn-primary">Create Expert</button>
    </form>
</div>
@endsection
