<template>
  <div>
    <Header />
    <v-dialog v-model="dialogedit" class=" bg-red" width="800px" style="background: white;">
      <v-card class="ma-0 pa-5" style="background: #fff;">
        <v-text-field prepend-inner-icon="mdi-book " v-model="editinput.editjudul" class="mb-10"
          label="Masukan Judul"></v-text-field>
        <v-textarea prepend-inner-icon="mdi-comment" v-model="editinput.editisi" clearable label="Masukan Isi"
          variant="underlined"></v-textarea>
        <div class="d-flex justify-end">
          <v-btn class="" color="secondery" @click="batalupdate">
            Batal
          </v-btn>
          <v-btn class="ml-4" color="primary" @click="confirmupdate">
            Ubah
          </v-btn>
        </div>
      </v-card>
    </v-dialog>
    <v-dialog v-model="dialogdelete" class="" width="800px" style="background: white;">
      <v-card class="pa-5">
        <div class="d-flex justify-content-center">

          <v-btn class="mr-5" color="secondery" @click="bataldelete">
            Batal
          </v-btn>
          <v-btn class="" color="red" @click="confirmdelete">
            Hapus
          </v-btn>
        </div>
      </v-card>
    </v-dialog>
    <div class="mt-15 " style="">
      <v-row class="ma-0 pa-8">
        <v-col cols="4" v-for="(catatan, index) in allcatatan" :key="index">
          <v-card class="pa-4">
            <div class="text-h6 font-weight-medium">{{ catatan.judul }}</div>
            <div class="text-subtitle-1 "> {{ catatan.isi }}</div>
            <div class="text-caption "> {{ catatan.created_at }}</div>

            <v-btn class="" color="warning " @click="edit(catatan)">
              Edit
            </v-btn>
            <v-btn class="" color="red" @click="hapus(catatan)">
              Hapus
            </v-btn>
          </v-card>
        </v-col>
      </v-row>
    </div>
  </div>
</template>

<script>
import Header from "~/components/Header.vue";
import supabase from '~/plugins/supabase.js'
import axios from 'axios';

export default {
  // middleware:"middlewareguest",
  middleware:"middlewareguest",
  components: {
    Header
  },
  name: 'IndexPage',
  data() {
    return {
      allcatatan: null,
      dialogedit: false,
      dialogdelete: false,
      editinput: {

        editjudul: null,
        editisi: null,
      },
    }
  },
  methods: {
    async getallcatatan() {
      const { data, error } = await supabase.from("catatan").select("*");//1
      try {
        this.allcatatan = data
        console.log(this.allcatatan)
      } catch (error) {
        console.error("Terjadi kesalahan saat menghapus data:", error.message);
      }
    },

    async edit(c) {
      this.dialogedit = true
      this.editinput.editjudul = c.judul
      this.editinput.editisi = c.isi
      this.cttid = c.id

    },
    batalupdate() {
      this.editinput.editjudul = null
      this.editinput.editisi = null
      this.cttid = null
      this.dialogedit = false
      console.log(this.cttid)
    },
    async confirmupdate() {

      let judul = this.editinput.editjudul
      let isi = this.editinput.editisi
      try {
        const { data, error } = await supabase.from("catatan").update([{ judul, isi }]).eq('id', this.cttid);
        this.dialogedit = false
        console.log(data)
        this.getallcatatan()
        if (error) {
          console.error('Terjadi kesalahan saat mengambil data:', error.message);
        } else {
          // console.log('Data catatan:', data);
        }
      } catch (error) {
        console.error("Terjadi kesalahan saat update data:", error.message);
      }

    },

    hapus(c) {
      this.dialogdelete = true
      console.error("pbalap")
      this.cttid = c.id
    },
    async confirmdelete() {
      try {
        const { data, error } = await supabase.from("catatan").delete().eq('id', this.cttid);
        this.dialogdelete = false
        console.log(data)
        console.log(this.cttid)
        this.getallcatatan()
        if (error) {
          console.error('Terjadi kesalahan saat mengambil data:', error.message);
        } else {
          console.log('Data catatan:', data);
        }
      } catch (error) {
        console.error("Terjadi kesalahan saat menghapus data:", error.message); s
      }


    },
    bataldelete() {
      this.cttid = null
      this.dialogdelete = false
      console.log(this.cttid)

    },
    btnp() {
      console.log(this.cttid)
    }

  },
 async  created() {
    console.log(await supabase.auth.getUser())
    this.getallcatatan()
  },

}
</script>
