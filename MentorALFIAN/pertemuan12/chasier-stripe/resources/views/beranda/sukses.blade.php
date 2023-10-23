@extends('layouts.main')
@section('container')
<div class="mt-40 flex justify-center">

    <div class="bg-green-10 w-3/12  rainbow-backgroud rounded-lg p-6 rotate-180 transfor transitio-transform animat-spin">
        <div class="flex items-center justify-center">
            <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <div class="text-center mt-4 ">
            <h2 class="text-xl font-semibold text-green-700">Pembayaran Berhasil</h2>
            <p class="text-gray-600">Terima kasih atas pembayaran Anda. Transaksi selesai.</p>
        </div>
    </div>

</div>
</div>
<style>

.rainbow-background {
    animation: rainbow 5s linear infinite, spin 0.5s linear infinite;
}

@keyframes rainbow {
  0% { background: #ff0000; } /* Merah */
  14% { background: #ff9900; } /* Jingga */
  28% { background: #ffff00; } /* Kuning */
  42% { background: #33cc33; } /* Hijau Terang */
  57% { background: #3399ff; } /* Biru */
  71% { background: #9900cc; } /* Ungu */
  85% { background: #ff33cc; } /* Merah Muda */
  100% { background: #ff0000; } /* Kembali ke Merah */
}
</style>

@endsection
