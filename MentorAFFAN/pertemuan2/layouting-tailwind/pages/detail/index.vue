    <template>
  <div>
    <NumHeader />
    <div class="container px-12">
      <NavHeader />
      <LinkKu linkku="Detail" />
      <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12">
          <div class="grid grid-cols-12 gap-8">
            <!-- <div class="col-span-6" v-for="(im,i) in imgdatagam" :key="i"> -->
            <div class="col-span-6">
              <img
                src="~/assets/img/punyaku.jpg"
                class="w-52"
                alt=""
                srcset=""
              />
            </div>
            <div class="col-span-6">
              <img
                src="~/assets/img/punyaku.jpg"
                class="w-52"
                alt=""
                srcset=""
              />
            </div>
            <div class="col-span-6">
              <img
                src="~/assets/img/punyaku.jpg"
                class="w-52"
                alt=""
                srcset=""
              />
            </div>
            <div class="col-span-6">
              <img
                src="~/assets/img/punyaku.jpg"
                class="w-52"
                alt=""
                srcset=""
              />
            </div>
          </div>
        </div>
        <div class="col-span-12 lg:col-span-6 md:col-span-6 sm:col-span-12 items-center">
          <div class="">
            <p class="font-semibold text-xl">Xiaomi Lego Ver.</p>
            <p class="font-semibold text-2xl">Rp. 1.000.000</p>
            <div class="grid grid-cols-12 justify-between mt-4">
              <div class="col-span-6">
                <button
                class="rounded-full lg:w-auto text-center text-xl bg-white border border-gray-400 px-6 py-2 text-gray-700 transition duration-300 ease-in-out hover:bg-gray-100"
                >
                Tambah
              </button>
            </div>
            <div class="col-span-6">
              <button
              class="rounded-full lg:w-auto text-center text-xl bg-[#2F432D] border px-6 py-2 text-white transition duration-300 ease-in-out hover:bg-green-950"
              >
              Beli Sekarang
            </button>
          </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-6">
        <div>
          <p class="font-bold text-xl">Barang yang mungkin kamu sukai</p>
          <div class="mt-6">
            <div class="grid grid-cols-12 lg:grid-cols-5 md:grid-cols-5 sm:grid-cols-12 gap-4">
              <div class="col-span-6 lg:col-span-1 md:col-span-1 sm:grid-col-6 mb-4" v-for="(cj, i) in cardjual" :key="i">
                <div class="kartu p-3 rounded shadow-md">
                  <img
                    src="~/assets/img/punyaku.jpg"
                    class="max-w-full"
                    alt=""
                    srcset=""
                  /> 
                  <div class="caption">
                    <p class="font-semibold">{{ cj.judul }}</p>
                    <p class="text-sm">{{ cj.deskripsi }}</p>
                    <button
                      @click="$router.push('/detail')"
                      class="border border-black rounded-full py-2 text-xs mt-3 hover:bg-[#2F432D] transition ease-in-out duration-200 hover:text-white px-4"
                    >
                      Lebih Lengkap
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
      cardjual: [
        {
          judul: "Ayam goreng aja",
          deskripsi: "uwwweeenakkkk cik",
          foto: "punyaku.jpg",
        },
        {
          judul: "tempe goreng",
          deskripsi: "uwwweeenakkkk cik",
          foto: "punyaku.jpg",
        },
        {
          judul: "pakai sambal",
          deskripsi: "uwwweeenakkkk cik",
          foto: "punyaku.jpg",
        },
        {
          judul: "pakai nasi",
          deskripsi: "uwwweeenakkkk cik",
          foto: "punyaku.jpg",
        },
        {
          judul: "minumnya es teh",
          deskripsi: "uwwweeenakkkk cik",
          foto: "punyaku.jpg",
        },
      ],
      imgdatagam: [{ img: "punyaku.jpg" }],
    };
  },
};
</script>