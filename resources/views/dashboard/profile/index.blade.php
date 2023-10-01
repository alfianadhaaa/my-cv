@extends('dashboard.layout')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row justify-content-between">
        <div class="col-5">
          <h3>Profile</h3>
          @if (get_meta_data('_foto'))
              <img style="max-width:100px;max-height:100px" src="{{ asset('foto') . '/' . get_meta_data('_foto')}}" alt="Foto Profil">
          @endif
          <div class="mb-3">
            <label for="_foto" class="form-label">Foto</label>
            <input type="file" class="form-control form-control-sm @error('_foto') is-invalid @enderror" name="_foto" id="_foto">
            @error('_foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="_kota" class="form-label">Kota</label>
            <input type="text" class="form-control form-control-sm" name="_kota" id="_kota" value="{{ get_meta_data('_kota') }}">
          </div>
          <div class="mb-3">
            <label for="_provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi" value="{{ get_meta_data('_provinsi') }}">
          </div>
          <div class="mb-3">
            <label for="_nohp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp" value="{{ get_meta_data('_nohp') }}">
          </div>
          <div class="mb-3">
            <label for="_email" class="form-label">Email</label>
            <input type="text" class="form-control form-control-sm @error('_email') is-invalid @enderror" name="_email" id="_email" value="{{ get_meta_data('_email') }}">
            @error('_email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
        </div>
        <div class="col-5">
          <h3>Akun Media Social</h3>
          <div class="mb-3">
            <label for="_facebook" class="form-label">Facebook</label>
            <input type="text" class="form-control form-control-sm" name="_facebook" id="_facebook" value="{{ get_meta_data('_facebook') }}">
          </div>
          <div class="mb-3">
            <label for="_instagram" class="form-label">Instagram</label>
            <input type="text" class="form-control form-control-sm" name="_instagram" id="_instagram" value="{{ get_meta_data('_instagram') }}">
          </div>
          <div class="mb-3">
            <label for="_linkedln" class="form-label">Linkedln</label>
            <input type="text" class="form-control form-control-sm" name="_linkedln" id="_linkedln" value="{{ get_meta_data('_linkedln') }}">
          </div>
          <div class="mb-3">
            <label for="_github" class="form-label">Github</label>
            <input type="text" class="form-control form-control-sm" name="_github" id="_github" value="{{ get_meta_data('_github') }}">
          </div>
        </div>
      </div>
        
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

{{-- @push('child-scripts')
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
@endpush --}}