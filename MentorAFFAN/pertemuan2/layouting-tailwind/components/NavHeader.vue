<template>
    <div>
        <nav class="flex items-center justify-between flex-nowrap text-xs mb-4">
                <nuxt-link to="/" class="flex items-center  text-white mr-6">
                    <img src="~/assets/img/logo.png" alt="" srcset="" class="w-10">
                    <span class="font-bold  ml-4 text-xl text-black tracking-tight text-md">Toko Nganu</span>
                </nuxt-link>
                <div class="flex">
                    
                    <nuxt-link to="/keranjang" class="  rounded-full bg-gray-200 mr-3 p-3 hover:bg-gray-300   text-white">
                        <svg class="  h-6 w-6 text-gray-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="9" cy="21" r="1" />  <circle cx="20" cy="21" r="1" />  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" /></svg>
                    </nuxt-link>
                    <div class="flex items-center">
                        <nuxt-link to="/user-profil" class="  rounded-full bg-gray-200 shadow-lg p-1  hover:bg-gray-300  text-white">
                            <img src="~/assets/img/punyaku.jpg" class="object-fill h-10 w-10 rounded-full"  alt="" srcset="">
                        </nuxt-link>
                        <p class="font-semibold ml-2">Izanagi faris </p>
                    </div>
                </div>
            </nav>
    </div>
</template>
