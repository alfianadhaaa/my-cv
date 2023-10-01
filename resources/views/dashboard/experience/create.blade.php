@extends('dashboard.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('experience.index') }}" class="btn btn-secondary">
            << Kembali</a>
    </div>

    <form action="{{ route('experience.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror " name="judul"
                id="judul" aria-describedby="helpId" placeholder="Posisi" value="{{ old('judul') }}" autofocus>
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Bahasa/Framework</label>
            <input type="text" class="skill form-control form-control-sm @error('info1') is-invalid @enderror"
                name="info1" id="info1" aria-describedby="helpId" placeholder="Nama Perusahaan"
                value="{{ old('info1') }}">
            @error('info1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto"><input type="date"
                        class="form-control form-control-sm @error('tgl_mulai') is-invalid @enderror" name="tgl_mulai"
                        id="tgl_mulai" placeholder="dd/mm/yy" value="{{ old('tgl_mulai') }}">
                    @error('tgl_mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir"
                        id="tgl_akhir" placeholder="dd/mm/yy" value="{{ old('tgl_akhir') }}"></div>
            </div>
        </div> --}}
        <div class="mb-3">
            <label for="isi" class="form-label">Workflow</label>
            <textarea class="form-control summernote @error('isi') is-invalid @enderror" name="isi" id="isi"
                rows="5">{{ old('isi') }}</textarea>
            @error('isi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
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
