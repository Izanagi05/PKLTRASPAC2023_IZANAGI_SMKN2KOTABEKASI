<template>
  <div>
   <Header />

   <v-container class="mt-15 " style="">
    <v-card class="pa-6 mx-auto " width="800px">
      <div class="font-weight-medium white--black  mb-5  text-h5">Buat Data</div>
      <v-text-field prepend-inner-icon="mdi-book " v-model="judulinput" class="mb-10" label="Masukan Judul"></v-text-field>
      <v-textarea prepend-inner-icon="mdi-comment" v-model="isiinput" clearable label="Masukan Isi" variant="underlined"></v-textarea>
      <div class="d-flex justify-end">
        <v-btn class="" color="primary"  @click="create(judulinput, isiinput)">
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
   components:{
     Header
   },
   name: 'IndexPage',
   data() {
     return {
      // datacatatan:{
        judulinput:null,
        isiinput:null,
      // }
     }
   },
   methods: {
   async create(judul, isi){
     const {data, error}=await supabase.from("catatan").insert([{judul, isi}]);
    try {
      console.log(isi)
      if(error){

      }else{
        this.$router.push('/')

      }

    } catch (error) {
      console.error("Terjadi kesalahan saat menambah data:", error.message);
    }
    }
   },
 }
 </script>
