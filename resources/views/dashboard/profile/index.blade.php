@extends('dashboard.layout')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf 
      <div class="row justify-content-beetwen">
        <div class="col-5">
          <h3>Profile</h3>
          @if (get_meta_value('_photo'))
              <img style="max-width:100px;max-weight:100px"  src="{{ asset('photo').'/'.get_meta_value('_photo') }}">
          @endif
          <div class="mb-3">
            <label for="_photo" class="form-label">Photo</label>
            <input type="file" class="form-control form-control-sm" name="_photo" id="_photo">
          </div>
          <div class="mb-3">
            <label for="_kota" class="form-label">Kota</label>
            <input type="text" class="form-control form-control-sm" name="_kota" id="_kota"
              value="{{ get_meta_value('_kota') }}">
          </div>
          <div class="mb-3">
            <label for="_provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi"
              value="{{ get_meta_value('_provinsi') }}">
          </div>
          <div class="mb-3">
            <label for="_phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control form-control-sm" name="_phonenumber" id="_phonenumber"
              value="{{ get_meta_value('_phonenumber') }}">
          </div>
          <div class="mb-3">
            <label for="_email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm" name="_email" id="_email" 
              value="{{ get_meta_value('_email') }}">
          </div>
        </div>

        <div class="col-5">
          <h3>Social Media</h3>
          <div class="mb-3">
            <label for="_facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control form-control-sm" name="_facebook" id="_facebook"
              value="{{ get_meta_value('_facebook') }}">
          </div>
          <div class="mb-3">
            <label for="_twitter" class="form-label">Twitter</label>
            <input type="text" class="form-control form-control-sm" name="_twitter" id="_twitter"
              value="{{ get_meta_value('_twitter') }}">
          </div>
          <div class="mb-3">
            <label for="_linkedin" class="form-label">Linkedin</label>
            <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin"
              value="{{ get_meta_value('_linkedin') }}">
          </div>
          <div class="mb-3">
            <label for="_github" class="form-label">Github</label>
            <input type="text" class="form-control form-control-sm" name="_github" id="_github"
              value="{{ get_meta_value('_github') }}">
          </div>
        </div>

      </div>
      
      <button class="btn btn-primary" name="save" type="submit">Save</button>
    </form> 
@endsection