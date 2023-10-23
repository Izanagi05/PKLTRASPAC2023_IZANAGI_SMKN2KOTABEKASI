<template>
  <div>
    <Header />  <v-btn @click="consolrel">ril</v-btn>
    <v-dialog v-model="dialogedit" class=" bg-red" width="800px" style="background: white;">
      <v-card class="ma-0 pa-5" style="background: #fff;">
        <v-text-field prepend-inner-icon="mdi-book " v-model="editinput.editjudul" class="mb-10"
          label="Masukan Judul"></v-text-field>
        <v-textarea prepend-inner-icon="mdi-comment" v-model="editinput.editisi" clearable label="Masukan Isi"
          variant="underlined"></v-textarea>
        <input type="file" name="" @change="ubahimg" id="">
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
            <!-- <v-img :src="datafotonya" /> -->
            <div class="" style="width: 100%;height: 200px;">
              <v-img :src="urlimg + catatan.image" style="width: 100%;height:100%;object-fit: cover;"/>
            </div>
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
  middleware: "middlewareguest",
  components: {
    Header
  },
  name: 'IndexPage',
  data() {
    return {
      allcatatan: null,
      datafotonya: null,
      dialogedit: false,
      dialogdelete: false,
      datanameimage: null,
      randomstr: null,
      fileimage: null,
      oldimage: null,
      editinput: {

        editjudul: null,
        editisi: null,
        editimage: null,
        urlimg: null,
        cekkosong: null,
      },
    }
  },
  mounted() {
    const changes = supabase
  .channel('catatan')
  .on(
    '*',
    (payload) =>  this.realdata=payload
  )
  .subscribe()

  },
  methods: {
    async consolrel(){
      console.log(this.realdata)
    },
    async getallcatatan() {
      this.urlimg = 'https://yykjftdovkjuvwgyzzig.supabase.co/storage/v1/object/public/image-catatan/'
      try {
        const { data: catatan, error } = await supabase.from("catatan").select("*");//1
        const { data: image_url } = supabase.storage.from('image-catatan').getPublicUrl('7696c8d4d1kabiiiiibaa.png', {
          cacheControl: '3600',
          upsert: true,
          transform: {
            width: 500,
            height: 600,
          },
        })
        console.log(image_url.publicUrl)
        this.datafotonya = image_url.publicUrl
        this.allcatatan = catatan
        // console.log(this.allcatatan)
      } catch (error) {
        console.error("Terjadi kesalahan saat menghapus data:", error.message);
      }
    },
    ubahimg(dt) {
      let files = dt.target.files[0]
      const crypto = require('crypto');
      this.randomstr = crypto.randomBytes(5).toString('hex');
      this.datanameimage = this.randomstr + files.name
      this.fileimage = files
      this.editinput.editimage = files.name
      console.log(this.randomstr + files.name.split(' ').join(''))
    },
    async edit(c) {
      this.dialogedit = true
      this.editinput.editjudul = c.judul
      this.editinput.editisi = c.isi
      this.editinput.editimage = c.image
      this.cekkosong = c.image
      this.oldimage = c.image
      console.log("old" + this.cekkosong)
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
      // let image = this.editinput.editimage
      let image2 = this.editinput.editimage
      console.log("p-" + image2)
      console.log(this.fileimage)
      try {
        let image = this.editinput.editimage

        const { data: upadte, error: imgerror } = await supabase
          .storage
          .from('image-catatan')
          .update(this.oldimage, this.fileimage, {
            cacheControl: '3600',
            upsert: true
          }
          );
        const { data: dataupdate, error: updateerror } = await supabase.from("catatan").update([{ judul, isi, image: upadte.path }]).eq('id', this.cttid);
        this.dialogedit = false
        console.log("WOI"+upadte)
        this.getallcatatan()
        if (updateerror) {
          console.error('Terjadi kesalahan saat mengambil data:', updateerror.message);
        } else {
          // console.log('Data catatan:', data);
        }
      } catch (updateerror) {
        console.error("Terjadi kesalahan saat update data:", updateerror.message);
      }

    },

    hapus(c) {
      this.dialogdelete = true
      console.error("pbalap")
      this.cttid = c.id
      this.imgdelete = c.image
      console.log(this.imgdelete)
    },
    async confirmdelete() {
      try {
        const { data: dtdelete, error: errdelete } = await supabase.from("catatan").delete().eq('id', this.cttid);
        const { data: imgdelete, error: imgerr } = await supabase
          .storage
          .from('image-catatan')
          .remove(this.imgdelete)
        this.dialogdelete = false
        console.log(dtdelete)
        console.log(this.cttid)
        this.getallcatatan()
        if (errdelete) {
          console.error('Terjadi kesalahan saat mengambi data:', error.message);
        } else {
          console.log('Data catatan:', dtdelete);
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
  async created() {
    console.log(await supabase.auth.getUser())
    this.getallcatatan()
  },

}
</script>
