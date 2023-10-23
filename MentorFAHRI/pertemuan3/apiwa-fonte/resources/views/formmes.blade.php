@extends('layouts.layoutku')
@section('container')

<div class="form-group py-2">
    <select name="pilihh">
      <option value="lok">Lokasi</option>
      <option value="pes">pesan biasa</option>
      <option value="poll">Poll</option>
    </select>
  </div>
<form action="/kirim" method="POST">
    @csrf
    <div class="form-group py-2">
      <label for="nomor">Nomor:</label>
      <textarea type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor"></textarea>
    </div>
    <div class="form-group py-2">
      <label for="pesan">Pesan:</label>
      <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan"></textarea>
    </div>
    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
  </form>
@endsection
