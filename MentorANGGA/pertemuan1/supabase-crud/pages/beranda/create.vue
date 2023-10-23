<template>
  <div>
   <Header />

   <v-container class="mt-15 " style="">
    <v-card class="pa-6 mx-auto " width="800px">
      <div class="font-weight-medium white--black  mb-5  text-h5">Buat Data</div>
      <v-text-field prepend-inner-icon="mdi-book " v-model="judulinput" class="mb-10" label="Masukan Judul"></v-text-field>
      <v-textarea prepend-inner-icon="mdi-comment" v-model="isiinput" clearable label="Masukan Isi" variant="underlined"></v-textarea>
      <input type="file" name="" id="" @change="fileM">
      <div class="d-flex justify-end">
        <v-btn class="" color="primary"  @click="create(judulinput, isiinput, datanameimage, fileimage)">
          Buat
        </v-btn>
      </div>
    </v-card>
   </v-container>
  </div>
 </template>

 <script>
 import Header from "~/components/Header.vue";
 import supabase from '~/plugins/supabase.js'

 export default {
  middleware:["middlewareguest"],
   components:{
     Header
   },
   name: 'IndexPage',
   data() {
     return {
      // datacatatan:{
        judulinput:"ppp",
        isiinput:"pp",
        datanameimage:null,
        fileimage:null,
        imagenama:null,
        randomstr:null
      // }
     }
   },
    methods: {
      fileM(dt){
        let files =dt.target.files[0]
        const crypto = require('crypto');
        this.randomstr=  crypto.randomBytes(5).toString('hex');
        this.datanameimage= this.randomstr+files.name
        this.fileimage= files
        // this.filesementara= files.name.split(' ').join('')
        console.log(this.randomstr+files.name.split(' ').join(''))
      },
    async create(judul, isi, image, storageimage){
     try {
    if(image){
   const {data:imgupl, error:imgerr}=   await supabase.storage.from('image-catatan').upload(this.datanameimage, storageimage);
      // console.log(imgupl)
   if(!imgerr){
    let image= imgupl.path
    const {data, error}=await supabase.from("catatan").insert([{judul, isi, image}]);
    this.$router.push('/beranda')
  }
}
  // if(error){
  //   console.log("ppp".error)
  // }else{
  // }
} catch (error) {
      console.error("Terjadi kesalahan saat menambah data:", error.message);
    }
    }
   },
 }
 </script>
