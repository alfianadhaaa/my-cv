@extends('dashboard.layout')

@section('content')
    <form action="{{ route('skill.update') }}" method="POST">
      @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">PROGRAMMING LANGUAGE & TOOLS</label>
          <input type="text" class="form-control form-control-sm skill" name="_language" id="judul" aria-describedby="helpId" placeholder="Programming Language & Tools" value="{{ get_meta_data('_language') }}">
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">WORKFLOW</label>
          <textarea class="form-control summernote" name="_workflow" id="isi" rows="5">{{ get_meta_data('_workflow') }}</textarea>
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