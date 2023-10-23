<template>
  <div>
    <!-- <Header />   -->

    <v-btn @click="consolrel">ril</v-btn>
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
  // middleware: "middlewareguest",
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
    'postgres_changes', {
      event: '*', // Listen only to UPDATEs
      schema: 'public',
      table:'catatan'
    },
    (payload) => {

      console.log(payload)
      // this.getallcatatan
      if(payload.new.id){
      if(payload.eventType === 'INSERT'){
        const newdata= payload.new
          this.allcatatan.push(newdata)

      }else if(payload.eventType === 'UPDATE'){
        const realdata=payload.new.id
      const indexCurrentdata= this.allcatatan.findIndex ((item)=> item.id == realdata);
        const datasementara= this.allcatatan

        datasementara[indexCurrentdata]= payload.new
        console.log("tes1"+JSON.stringify(datasementara[indexCurrentdata]))
        this.allcatatan=[...datasementara]
        console.log("tes2"+JSON.stringify(this.allcatatan))
        console.log("tes3"+JSON.stringify([...datasementara]))
      }
    }else if(payload.eventType === 'DELETE'){
      const realdltdata=payload.old.id
      const indexDeletedData= this.allcatatan.findIndex ((item)=> item.id == realdltdata);
      this.allcatatan.splice(indexDeletedData, 1);
    }
    }
    )
  .subscribe()

  },
  methods: {
    async consolrel(){
      console.log(this.realdata)
      this.realdata = payload;
      // this.getallcatatan()
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
