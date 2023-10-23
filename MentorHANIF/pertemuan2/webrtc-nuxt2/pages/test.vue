<template>
  <div style="background-color: #e3ded1;">
    <v-dialog v-model="dialogroom" max-width="600px" persistent>
      <v-card color="#e3ded1" class="" >
        <div class="text-h5 pa-4 textkujudul font-weight-medium d-flex align-items-center justify-space-between">
          Buat Roommu
          <v-icon @click="dialogroom=false">
            mdi-close
          </v-icon>
        </div>
        <hr>
        <div class="pa-4">
          <v-text-field label="Room Name" class="my-8" clearable v-model="inputId"></v-text-field>
          <div class="d-flex align-items-center justify-end">
            <v-btn class="mr-4" @click="joinn">Join Room</v-btn>
          </div>
        </div>
      </v-card>
    </v-dialog>
    <v-app-bar dense></v-app-bar>
    <v-container class="px-2 pt-4 py-15">
      <v-row>
        <v-col cols="12" lg="5" md="5" class="d-flex align-center justify-center " order="2" order-lg="1" order-md="1">
          <v-card flat color="#e3ded1" class="px-4">
            <div class="text-justify mb-4">
              <div class="display-2 font-weight-medium mb-2 textkujudul"  >
                Tinggal satu klik
              </div>
               untuk memulai rapat baru. Segera setelah Anda masuk, tombol <span class="pa-1 ma-2 white--text text-h6" style="background-color: #969286;">"Mulai Rapat Baru"</span>akan membimbing Anda ke ruang rapat virtual Anda sendiri. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam, incidunt enim praesentium maxime minima laborum animi voluptatem, quia similique expedita earum eveniet excepturi? Expedita? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis, debitis.
            </div>
            <v-btn @click="ondialog">Join Room</v-btn>

          </v-card>
        </v-col>
        <v-col cols="12" lg="7" md="7" class="" order="1" order-lg="2" order-md="2">
          <div class="">
            <v-img :src="require('~/assets/man.png')" max-width="80%" class="mx-auto" ></v-img>
          </div>

        </v-col>
      </v-row>
    </v-container>


    <!-- <v-bottom-navigation v-model="value" app>
      <v-btn value="recent">
        <span>Recent</span>

        <v-icon>mdi-history</v-icon>
      </v-btn>

      <v-btn value="favorites">
        <span>Favorites</span>

        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn value="nearby">
        <span>Nearby</span>

        <v-icon>mdi-map-marker</v-icon>
      </v-btn>
    </v-bottom-navigation> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      inputId: "",
      value:"",
      dialogroom:false
    };
  },
  methods: {
    joinn(){
      this.$router.push(`/room?roomId=${this.inputId}`)
      console.log("p")
    },
    ondialog(){
      this.dialogroom=true;
    }
  },
};
</script>
<style>
#cameraView {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg); /* Safari and Chrome */
  -moz-transform: rotateY(180deg); /* Firefox */
}
</style>
