@extends('dashboard.layout')

@section('content')
    <form action="{{ route('pengaturanhalaman.update') }}" method="POST">
      @csrf
        <div class="form-group row">
          <div class="col-sm-2">About</div>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_halaman_about">
              <option value="">--Pilih--</option>
              @foreach ($datahalaman as $item)
                  <option value="{{ $item->id }}" {{ get_meta_data('_halaman_about') == $item->id ? 'selected' : '' }}>{{ $item->judul }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Interest</div>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_halaman_interest">
              <option value="">--Pilih--</option>
              @foreach ($datahalaman as $item)
                  <option value="{{ $item->id }}" {{ get_meta_data('_halaman_interest') == $item->id ? 'selected' : '' }}>{{ $item->judul }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Award</div>
          <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_halaman_award">
              <option value="">--Pilih--</option>
              @foreach ($datahalaman as $item)
                  <option value="{{ $item->id }}" {{ get_meta_data('_halaman_award') == $item->id ? 'selected' : '' }}>{{ $item->judul }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection