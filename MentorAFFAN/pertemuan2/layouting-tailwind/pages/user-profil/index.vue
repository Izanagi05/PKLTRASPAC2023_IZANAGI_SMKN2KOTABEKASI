<template>
    <div>
        <NumHeader />
        <div class="w-full px-6 lg:px-12 md:px-12">
            <NavHeader />
            <div class="mt-10 lg:mt-16 md:mt-16 ">
                    <p class="text-2xl font-semibold mb-4 lg:mb-4 md:mb-10">Profil Pengguna</p>

            <div class="grid grid-cols-12 ">
                <div class="col-span-12 w-full order-2 lg:col-span-2 md:flex md:flex-wrap md:col-span-12 lg:order-1 md:order-2 mt-4 lg:mt-0 md:mt-8">
                    <div class="">
                    <ul class=" list-none  lg:block md:flex md:items-center">
                        <li class="text-decoration-none py-3 mr-4 lg:mr-0 md:mr-8  " v-for="(rute, i) in  rutes" :key="i">
                            <nuxt-link :to="rute.rt" class="flex  text-xl font-medium py-2 lg:text-xl md:text-3xl"><svg class="h-8 mr-2 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />  <path d="M5 21v-10.15" />  <path d="M19 21v-10.15" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg> {{ rute.nama }}</nuxt-link>
                        </li>
                    </ul>
                    </div>
                    <button class="text-semibold flex lg:mt-0 md:mt-10 py-2 font-semibold hover:bg-gray-200 transition ease-in-out duration-200 rounded-full items-center"><svg class="h-8 w-8 mr-2 text-black"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />  <polyline points="16 17 21 12 16 7" />  <line x1="21" y1="12" x2="9" y2="12" /></svg>Logout</button>
                </div>  
                <div class="col-span-12 w-full order-1 lg:col-span-10 md:col-span-10 lg:order-2 md:order-1">
                    <div class=" lg:flex md:flex ">
                    <div class="border-l-8 border-gray-300 rounded-l-lg h-450px mr-10 hidden lg:block md:block"></div>
                    <div class="">
                        <LinkKu linkku="Profil Pengguna"/>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="col-span-2 justify-center lg:col-span-1 md:col-span-1 flex mb-4 lg:mb-0 md:mb-0   pr-4">
                                <img src="~/assets/img/punyaku.jpg"  alt="" class="rounded-full  w-52 lg:w-56 md:w-56" />
                            </div>
                            <div class="col-span-2 lg:col-span-1 md:col-span-1 md:flex lg:flex lg:justify-start md:justify-start items-center ">
                                <div class="infoP ">
                                    <p class="pb-0 lg:pb-3 md:pb-3 text-lg lg:text-2xl md:text-2xl font-semibold">Info Pengguna</p>
                                    <div class="flex">
                                        <p class="pb-0 lg:pb-3 md:pb-3 ">Nama: </p>
                                        <p class="pb-0 lg:pb-3 md:pb-3 ">Izanagi</p>
                                    </div>
                                    <div class="infoP">
                                        <p class="pb-0 lg:pb-3 md:pb-3 text-lg lg:text-2xl md:text-2xl font-semibold">Info Kontak</p>
                                        <div class="flex">
                                            <p class="pb-0 lg:pb-3 md:pb-3 ">Telepon: </p>
                                            <p class="pb-0 lg:pb-3 md:pb-3 ">Izanagi</p>
                                        </div>
                                        <div class="flex">
                                            <p class="pb-0 lg:pb-3 md:pb-3 ">Email: </p>
                                            <p class="pb-0 lg:pb-3 md:pb-3 ">Izanagi@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nuxt-link to="/user-profil/edit-profil"
                                class="border text-center col-span-2 lg:col-span-1 md:col-span-1 border-black  py-2 text-base lg:text-xl md:text-xl sm:text-sm xs:text-md font-semibold mt-3 hover:bg-[#2F432D] hover:text-white rounded-full transition ease-in-out duration-200 px-4 w-full">
                                Edit Profil
                            </nuxt-link>
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
import NavHeader from '~/components/NavHeader.vue'
import NumHeader from '~/components/NumHeader.vue' 
export default {
    components: {
        NavHeader,
        NumHeader
    },
    data() {
        return {
            rutes: [
                { nama: 'Toko', rt: '/user-profil/toko' },
                { nama: 'Buka Toko', rt: '/' },
                { nama: 'Tambah Barang', rt: '/user-profil/tambah-barang' },
            ]
        }
    },
}
</script>