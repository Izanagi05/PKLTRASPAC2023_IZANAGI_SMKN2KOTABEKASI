<template>
  <div>
    <v-container style="padding:100px 0px;"  class="d-flex align-content-center">
      <v-row>
        <div class="text-center display-3 col-12">
          Anda Harus Login terlebih dahulu
        </div>
        <div class="text-center display-3 col-12">
          Timer: {{ waktu }}
        </div>
      </v-row>
    </v-container>
  </div>
</template>
<script>
  import supabase from '~/plugins/supabase.js'
export default {
  // middleware:"middlewareguest",
  // middleware:'middlewareauth',
  data() {
    return {
      waktu:1
    }
  },
  mounted() {
    // setTimeout(() => {
    //  // Ganti dengan jalur ke halaman login
    // }, 3000);
    // this.cdstart()

  },
  methods: {
    // cdstart(){
    //   const timer = setInterval(() => {
    //   this.waktu--;
    //   if (this.waktu <= 0) {
    //     clearInterval(timer); // Menghentikan interval jika hitungan mundur berakhir
    //   }
    // }, 1000);
    // }
  },
}
</script>
