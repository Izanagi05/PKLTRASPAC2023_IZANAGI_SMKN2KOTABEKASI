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
      <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor">
    </div>
    <div class="form-group py-2">
      <label for="pesan">Pesan:</label>
      <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Masukkan pesan"></textarea>
    </div>
    <div class="form-group py-2">
      <label for="pesan">Choices:</label>
      <textarea class="form-control" id="pesan" name="choices" rows="4" placeholder="Masukkan pesan"></textarea>
    </div>
    <div class="form-group py-2">
      <label for="pesan">Select:</label>
      <select name="select">
        <option value="single">Single</option>
        <option value="multiple">Multiple</option>
      </select>
    </div>
    <div class="form-group py-2">
      <label for="pesan">Pollname:</label>
      <input type="text" class="form-control" id="pesan" name="pollname" rows="4" placeholder="Masukkan pesan">
    </div>
    <div class="form-group py-2">
      <label for="file">Pilih File:</label>
      <input type="file" class="form-control-file" id="file" name="file">
    </div>
    <button type="submit" name='submit' class="btn btn-primary">Submit</button>
  </form>
@endsection
