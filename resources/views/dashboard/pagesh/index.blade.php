@extends('dashboard.layout')

@section('content')
    <p class="card-title">Page</p>
    <div class="pb-3"><a href="{{ route('pagesh.create') }}" class="btn btn-primary">+ Create Page</a></div>
    <div class="table-responsive">
      <table class="table table-stripped">
        <thead>
          <tr>
            <th class="col-1">No</th>
            <th>Title</th>
            <th class="col-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          @foreach ($data as $item)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $item->title }}</td>
              <td>
                <a href="{{ route('pagesh.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form onsubmit="return confirm('Are you sure to delete data?')"
                action="{{ route('pagesh.destroy', $item->id) }}" class="d-inline" method="POST">
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
