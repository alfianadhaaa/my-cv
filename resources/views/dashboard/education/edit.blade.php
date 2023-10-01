@extends('dashboard.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('education.index') }}" class="btn btn-secondary"> << Kembali</a>
    </div>

    <form action="{{ route('education.update', $data->id) }}" method="POST">
      @csrf
      @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Universitas</label>
          <input type="text"
            class="form-control form-control-sm @error('judul') is-invalid @enderror " name="judul" id="judul" aria-describedby="helpId" placeholder="Universitas" value="{{ $data->judul }}" autofocus>
            @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Nama Fakultas</label>
          <input type="text"
            class="form-control form-control-sm @error('info1') is-invalid @enderror" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Fakultas" value="{{ $data->info1 }}" >
            @error('info1')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="info2" class="form-label">Program Studi</label>
          <input type="text"
            class="form-control form-control-sm @error('info2') is-invalid @enderror" name="info2" id="info2" aria-describedby="helpId" placeholder="Program Studi" value="{{ $data->info2 }}" >
            @error('info2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="info3" class="form-label">IPK</label>
          <input type="text"
            class="form-control form-control-sm @error('info3') is-invalid @enderror" name="info3" id="info3" aria-describedby="helpId" placeholder="IPK" value="{{ $data->info3 }}" >
            @error('info3')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-auto">Tanggal Mulai</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai" id="tgl_mulai" placeholder="dd/mm/yy" value="{{ $data->tgl_mulai }}">
              @error('tgl_mulai')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
            </div>
            <div class="col-auto">Tanggal Akhir</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir" id="tgl_akhir" placeholder="dd/mm/yy" value="{{ $data->tgl_akhir }}"></div>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection