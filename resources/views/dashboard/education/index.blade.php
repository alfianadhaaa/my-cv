@extends('dashboard.layout')

@section('content')
  <p class="card-title">Education</p>
  <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Tambah Education</a></div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col-1">No</th>
          <th>Universitas</th>
          <th>Fakultas</th>
          <th>Program Studi</th>
          <th>IPK</th>
          <th>Tgl Awal</th>
          <th>Tgl Akhir</th>
          <th class="col-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1 ?>
        @foreach ($data as $item)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->info1 }}</td>
            <td>{{ $item->info2 }}</td>
            <td>{{ $item->info3 }}</td>
            <td>{{ $item->tgl_mulai_indo }}</td>
            <td>{{ $item->tgl_akhir_indo }}</td>
            <td>
              <a href="{{ route('education.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('education.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Yakin akan mengahapus data ini?')" method="POST">
                @csrf
                @method('DELETE')
                <button name="submit" type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
          <?php $i++ ?>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
