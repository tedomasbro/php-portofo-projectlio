@extends('dashboard.layout')

@section('content')
    <p class="card-title">Education</p>
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Create Education</a></div>
    <div class="table-responsive">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th class="col-1">No</th>
            <th>Nama Sekolah</th>
            <th>Jurusan</th>
            <th>Prodi</th>
            <th>GPA</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th class="col-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          @foreach ($data as $item)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->info1 }}</td>
              <td>{{ $item->info2 }}</td>
              <td>{{ $item->info3 }}</td>
              <td>{{ $item->start_date_idn }}</td>
              <td>{{ $item->end_date_idn }}</td>
              <td>
                <a href="{{ route('education.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form onsubmit="return confirm('Are you sure to delete data?')"
                action="{{ route('education.destroy', $item->id) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                  <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                </form>
                
              </td>
            </tr>
            <?php $i++; ?>
          @endforeach
          
        </tbody>
      </table>
    </div>
@endsection
