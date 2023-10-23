<template>
  <div style="background-color: #e3ded1" class="pb-15">
    <v-dialog v-model="dialogroom" max-width="600px" persistent>
      <v-card color="#e3ded1" class="">
        <div
          class="text-h5 pa-4 textkujudul font-weight-medium d-flex align-items-center justify-space-between"
        >
          Buat Roommu
          <v-icon @click="dialogroom = false" color="#7b5037">
            mdi-close
          </v-icon>
        </div>
        <hr />
        <div class="pa-4">
          <v-text-field
            label="Room Name"
            class="my-8"
            clearable
            v-model="inputId"
            require
          ></v-text-field>
          <div class="d-flex align-items-center justify-end">
            <v-btn
              class="mr-4 textkujudul font-weight-bold text-body-1 borderku"
              outlined
              @click="joinn"
              large
              >Join Room</v-btn
            >
          </div>
        </div>
      </v-card>
    </v-dialog>
    <v-app-bar dense>
      <div class="text-h6 ml-4 textkujudul">
        <v-icon size="40" class="mr-2" color="#7b5037"
          >mdi-laptop-account</v-icon
        >
        RoomKu
      </div>
    </v-app-bar>
    <v-container class="px-2 pt-4 py-15">
      <v-row>
        <v-col
          cols="12"
          lg="6"
          md="6"
          class="d-flex align-center justify-center"
          order="2"
          order-lg="1"
          order-md="1"
        >
          <v-card flat color="#e3ded1" class="px-4">
            <div class="text-justify text-h6 font-weight-regular mb-4">
              <div class="display-2 font-weight-medium mb-2 textkujudul">
                Lakukan rapat online
              </div>
              untuk memulai rapat baru. Segera setelah Anda masuk, tombol
              <span
                class="pa-1 ma-2 white--text rounded text-h6"
                style="background-color: #969286"
                >"Mulai Rapat Baru"</span
              >akan membimbing Anda ke ruang rapat virtual Anda sendiri. Lorem
              ipsum dolor sit amet, consectetur adipisicing elit. Alias aperiam,
              incidunt enim praesentium maxime minima laborum animi voluptatem,
              quia similique expedita earum eveniet excepturi? Expedita? Lorem
              ipsum dolor sit, amet consectetur adipisicing elit. Omnis,
              debitis.
            </div>
            <v-btn
              @click="ondialog"
              class="textkujudul font-weight-bold text-body-1 borderku"
              outlined
              large
              >Buat Room</v-btn
            >
          </v-card>
        </v-col>
        <v-col
          cols="12"
          lg="6"
          md="6"
          class=""
          order="1"
          order-lg="2"
          order-md="2"
        >
          <div class="">
            <v-img
              :src="require('~/assets/man.png')"
              max-width="80%"
              class="mx-auto"
            ></v-img>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
  data() {
    return {
      inputId: null,
      value: "",
      dialogroom: false,
      
    };
  },
  methods: {
    joinn() {
      if (this.inputId === null || this.inputId === "") {
        this.$toast.error("Room input tidak boleh kosong", {
          duration: 3000,
          action: {
            text: "Oke",
            onClick: (e, toastObject) => {
              toastObject.goAway(0); // Menutup pesan toast
            },
          },
        });
        //   this.$toast.show("Room input tidak boleh kosong", {
        //     position:'top-left',
        //     duration: 3000,
        //     transition: "slide-x-reverse",
        //   className:'alertgagal',
        //   action: {
        //     text: "Oke",
        //     onClick: (e, toastObject) => {
        //       toastObject.goAway(0); // Menutup pesan toast
        //     }
        //   }
        // });
      } else {
        this.$router.push(`/room?roomId=${this.inputId}`);
        this.$toast.success("Berhasil masuk room", {
          duration: 3000,
          action: {
            text: "Oke",
            onClick: (e, toastObject) => {
              toastObject.goAway(0); // Menutup pesan toast
            },
          },
        });
        console.log("p");
      }
    },
    ondialog() {
      this.dialogroom = true;
    },
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
