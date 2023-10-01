@extends('dashboard.layout')

@section('content')
  <p class="card-title">Recent Purchases</p>
  <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Tambah Halaman</a></div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-1">No</th>
          <th>Judul</th>
          <th class="col-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        @foreach ($data as $item)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->judul }}</td>
            <td>
              <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('halaman.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Yakin akan mengahapus data ini?')" method="POST">
                @csrf
                @method('DELETE')
                <button name="submit" type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
          <?php $i++ ?>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
