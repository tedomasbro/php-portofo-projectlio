@extends('dashboard.layout')

@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="_language" class="form-label">PROGRAMMING LANGUAGE & TOOLS</label>
        <input type="text" class="form-control form-control-sm skill" name="_language" id="_language" aria-describedby="helpId" placeholder="PROGRAMMING LANGUAGE & TOOLS" value="{{ get_meta_value('_language') }}">
      </div>

      <div class="mb-3">
        <label for="_workflow" class="form-label">WORKFLOW</label>
        <textarea class="form-control summernote" rows="5" name="_workflow">{{ get_meta_value('_workflow') }}</textarea>
      </div>
      <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form> 
@endsection

@push('child-scripts')
<script>
  $(document).ready(function() {
      $('.skill').tokenfield({
          autocomplete: {
              source: [{!! $skill !!}],
              delay: 100
          },
          showAutocompleteOnFocus: true
      });
  });
</script>
@endpush