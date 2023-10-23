<template>
  <div>
    <NumHeader />
    <div class="container px-6 lg:px-12 md:px-12">
      <NavHeader />

      <div class="grid grid-cols-12 mt-16">
        <div class="col-span-12 lg:col-span-6 md:col-span-12 sm:col-span-12 flex justify-center">
          <div class="">
            <img
              src="~/assets/img/punyaku.jpg" 
              alt=""
              class="rounded-full w-44 mb-4 lg:w-80"
            />
            <button
              class="border border-black rounded-full py-2 text-xl font-semibold  hover:bg-[#2F432D] hover:text-white transition ease-in-out duration-200 px-4 w-full"
            >
              Pilih Foto
            </button>
          </div>
        </div>
        <div class="col-span-12 mt-4 lg:col-span-6 md:col-span-12 sm:col-span-12 lg:mt-0 md:mt-10 sm:mt-10 flex items-center lg:justify-start md:justify-center sm:justify-start">
          <div class="">
            <div
              class="grid grid-cols-12 mb-6"
              v-for="(fmi, i) in forminput"
              :key="i"
            >
              <div class="lg:col-span-3 md:col-span-3 gap-0 flex items-center">
                <label
                  class="uppercase tracking- text-gray-700 text-xs mb-2 lg:mb-0 md:lg-0 font-bold"
                  for="grid-first-name"
                >
                  {{ fmi.nama }}
                </label>
              </div>
              <div class="col-span-12 lg:col-span-9 md:col-span-9">
                <input
                  class="appearance-none  block w-full lg:w-96 md:w-96 bg-gray-200 text-gray-700 border border-black-500 rounded-md shadow-lg transition ease-in-out duration-200 py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                  id="grid-first-name"
                  type="text"
                  :placeholder="fmi.placeholder"
                />
              </div>
            </div>
            <div class="button pb-6 pt-5">
              <div class="grid grid-cols-2 lg:grid-cols-2 gap-4"> 
                  <div class="batal col-span-1">
                    <button @click="$router.push('/user-profil')"
                      class="rounded-full w-full  text-center text-xl bg-white border border-gray-400 py-2 text-gray-700 transition duration-200 ease-in-out hover:bg-gray-100"
                    >
                      Batal
                    </button> 
                </div>
                <div>
                  <div class="bayar col-span-1">
                    <button
                      class="rounded-full w-full  text-center text-xl bg-[#2F432D] border   py-2 text-white transition duration-200 ease-in-out hover:bg-green-950"
                    >
                      Simpan
                    </button>
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
export default {
  data() {
    return {
      forminput: [
        { nama: "Nama", placeholder: "Masukan Nama" },
        { nama: "Alamat", placeholder: "Masukan Alamat" },
        { nama: "No Telepon", placeholder: "Masukan No Telepon" },
      ],
    };
  },
};
</script>