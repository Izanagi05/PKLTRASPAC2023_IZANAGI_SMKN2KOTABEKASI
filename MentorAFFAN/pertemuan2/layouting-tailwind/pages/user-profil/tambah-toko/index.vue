<template>
  <div>
    <NavbarPolos />
    <div class="text-center justify-center tambah-container">
      <div class="dalam-container">
        <div class="foto-profil">
          <v-avatar width="170px" height="170px">
            <img src="https://cdn.vuetifyjs.com/images/cards/cooking.png" />
          </v-avatar>
          <h2 class="text-2xl font-semibold">Tambah Toko</h2>
        </div>

        <div class="rounded-xl overflow-hidden shadow-md">
          <div class="border-b p-4 cursor-pointer" @click="togglePanel(1)">
            <div class="font-semibold">Nama</div>
            <div class="text-gray-600">{{ panel1Open ? 'Nama Toko mu' : databarang.nama }}</div>
          </div>
          <div v-show="panel1Open" class="p-4">
            <v-text-field
              v-model="databarang.nama"
              placeholder="Masukan Nama Untuk Toko"
              outlined
              rounded
            ></v-text-field>
          </div>
        </div>

        <!-- Sisa panel di sini... -->

        <v-btn
          rounded
          outlined
          class="w-32 button-aksi"
          @click="buattoko()"
        >buat</v-btn>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      panel1Open: false,
      databarang:{
          nama:null
      }
      // Data lainnya...
    };
  },
  methods: {
    togglePanel(panel) {
      if (panel === 1) this.panel1Open = !this.panel1Open;
      // Metode toggle untuk panel lain...
    },
    // Metode lainnya...
  },
};
</script>
``
