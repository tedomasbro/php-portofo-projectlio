@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('pagesh.index') }}" class="btn btn-secondary">
      << Back</a>
    </div>
    <form action="{{ route('pagesh.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Title" value="{{ Session::get('title') }}">
      </div>

      <div class="mb-3">
        <label for="value" class="form-label">Value</label>
        <textarea class="form-control summernote" rows="5" name="value">{{ Session::get('value') }}</textarea>
      </div>
      <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form> 
@endsection