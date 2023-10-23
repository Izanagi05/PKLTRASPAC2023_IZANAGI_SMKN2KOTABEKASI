@extends('layouts.layoutku')
@section('container')

<div class="form-group py-2">
    <select name="pilihh">
      <option value="lok">Lokasi</option>
      <option value="pes">pesan biasa</option>
      <option value="poll">Poll</option>
    </select>
  </div>
<form action="/kirim/lok" method="POST">
    @csrf
    <div class="form-group py-2">
      <label for="nomor">Lokasi</label>
      <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor">
    </div>
    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
  </form>
@endsection
