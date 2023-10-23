@extends('layouts.main')
@section('container')

<div class="w-full ">
    <form action='/beranda/create/postplan' method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  enctype="multipart/form-data">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          nama produk
        </label>
        <input class=   "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nama" id="nama" type="text" placeholder="nama">
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            harga
        </label>
        <input class=   "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga" type="text" name="paket" placeholder="harga usd">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            kuantitas
        </label>
        <input class=   "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga" type="text" name="kuantitas" placeholder="harga usd">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
            deskripsi
        </label>
        <input class=   "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga" type="text" name="deskripsi" placeholder="deskripsi">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            foto
        </label>
        <input class=   "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga" type="file" name="foto" placeholder="foto">
         </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Buat
        </button>
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2020 Acme Corp. All rights reserved.
    </p>
  </div>
@endsection
