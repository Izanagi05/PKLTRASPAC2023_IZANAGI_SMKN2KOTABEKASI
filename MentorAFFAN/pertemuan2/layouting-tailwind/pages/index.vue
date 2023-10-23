<template>
    <div>
        <NumHeader />
        <div class="container px-6 lg:px-12 md:px-12">
            <nav class="flex items-center justify-between flex-nowrap mb-4 px-0">
                <div class="flex items-center  text-white mr-6">
                    <img src="~/assets/img/logo.png" alt="" srcset="" class="w-8 lg:w-10 md:w-10">
                    <span class="font-bold  ml-4 text-sm lg:text-xl md:text-xl text-black tracking-tight text-md">Toko Nganu</span>
                </div>
                <div class="flex">  
                    <div class="hidden w-ful lg:flex md:flex items-center relative mr-2">
                        <input
                            class=" appearance-none  w-full mb-0 rounded-full bg-gray-200 text-gray-700 border border-black-500 py-1  lg:py-3 lg:px-4 md:py-3 md:px-4 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="search">
                        <svg class="absolute right-3  w-4 lg:w-10 md:w-10 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </div>
                    
                 <nuxt-link to="/keranjang" class="  rounded-full bg-gray-200 lg:mr-3 md:mr-3 p-1 lg:p-3 md:p-3 hover:bg-gray-300   text-white">
                        <svg class="h-6 w-6  lg:h-6 md:w-6 text-gray-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="9" cy="21" r="1" />  <circle cx="20" cy="21" r="1" />  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" /></svg>
                    </nuxt-link>
                    <div class="flex items-center">
                        <nuxt-link to="/user-profil" class="  rounded-full bg-gray-200 shadow-lg p-1  hover:bg-gray-300  text-white">
                            <img src="~/assets/img/punyaku.jpg" class="object-fill h-10 w-10 lg:h-10 md:w-10 rounded-full"  alt="" srcset="">
                        </nuxt-link>
                        <p class="font-semibold ml-2">Iza... </p>
                    </div>
                </div>
            </nav>
            <div class="flex w-ful lg:hidden md:hidden  my-4 items-center relative mr-2">
                        <input
                            class=" appearance-none  w-full mb-0 rounded-full bg-gray-200 text-gray-700 border border-black-500 py-1  lg:py-3 lg:px-4 md:py-3 md:px-4 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="search">
                        <svg class="absolute right-3  w-4 lg:w-10 md:w-10 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </div>
            
            <div class="">
                <div class="">
                    <img src="~/assets/img/banner.png" class="max-w-full " alt="" srcset="">
                </div>
                <button class="flex flex-wrap  items-center mt-8 mb-2 bg-gray-200 px-6 py-1  rounded-full text-md font-medium  hover:bg-gray-300 ">
                    <svg class="h-4 w-4 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" /></svg>
                    <p class="ma-0">filter</p>
                </button>
            </div>
            <div class="mt-6">
                <div>
                    <p class="font-bold text-xl text-black">
                        Rekomendasi untuk anda
                    </p>

                    <div class=" mt-6">
                            <div class="grid grid-cols-12 lg:grid-cols-5 md:grid-cols-5  gap-4">
                                <div class=" col-span-6 lg:col-span-1 md:col-span-1 mb-4" v-for="(cj ,i) in cardjual" :key="i">
                                    <div class="kartu p-3 rounded shadow-md">
                                        <img src="~/assets/img/punyaku.jpg" class="max-w-full" alt="" srcset="">
                                        <!-- <img :src="require(`~/img/${cj.foto}`)" class="max-w-full" alt="" srcset=""> -->
                                        <!-- <img :src="'~/assets/img/'+cj.foto" alt="" srcset=""> -->
                                        <div class="caption">
                                            <p class="font-semibold">{{ cj.judul }}</p>
                                            <p class="text-sm">{{ cj.deskripsi }}</p>

                                            <button @click="$router.push('/detail')" class="border border-black rounded-full py-2 text-xs mt-3 font-semibold hover:border-transparent  hover:bg-[#2F432D] hover:text-white  transition ease-in-out duration-200   px-4">Lebih Lengkap</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NumHeader from '../components/NumHeader.vue'
export default {
    components:{
        NumHeader
    },
    data() {
        return {
                        cardjual:[
                {judul:'Ayam goreng aja', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'tempe goreng', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'pakai sambal', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'pakai nasi', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
                {judul:'minumnya es teh', deskripsi:'uwwweeenakkkk cik', foto:'punyaku.jpg'},
            ]

        }
    },

}
</script>