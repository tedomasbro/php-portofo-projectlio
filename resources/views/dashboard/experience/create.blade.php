@extends('dashboard.layout')

@section('content')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary">
      << Back</a>
    </div>
    <form action="{{ route('experience.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Position</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="position" value="{{ Session::get('title') }}">
      </div>

      <div class="mb-3">
        <label for="info1" class="form-label">Company Name</label>
        <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Company Name" value="{{ Session::get('info1') }}">
      </div>

      <div class="mb-3">
        <div class="row">
          <div class="col-auto">Start Date</div>
          <div class="col-auto"><input type="date" class="form-control form-control-sm" name="start_date" 
            placeholder="dd/mm/yyyy" value="{{ Session::get('start_date') }}"></div>
          <div class="col-auto">End Date</div>
          <div class="col-auto"><input type="date" class="form-control form-control-sm" name="end_date" 
            placeholder="dd/mm/yyyy" value="{{ Session::get('end_date') }}"></div>
          <div class="col-auto"></div>
        </div>
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control summernote" rows="5" name="content">{{ Session::get('content') }}</textarea>
      </div>
      <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form> 
@endsection