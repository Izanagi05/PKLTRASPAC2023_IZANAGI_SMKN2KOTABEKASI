<template>
  <div style="background-color: #e3ded1;">
    <v-app-bar dense >
      <div class="d-flex justify-space-between align-center" style="width:100%;">

      <v-btn icon @click="$router.push('/')">
        <v-icon> mdi-arrow-left </v-icon>
      </v-btn>
       <v-subheaders class="ma-0">Your Peer ID: {{ peerId }}</v-subheaders>
      </div>
      </v-app-bar
    >
    <v-container class="px-2 pt-4 py-15" >
      <v-row class="">
        <v-col cols="12" lg="10" md="10" class="" style="" order="2" order-lg="1" order-md="1">
         <v-card flat  color="#e3ded1" class="grey lighten-5 pa-4 rounded-xl">
          <div>
          <v-img src="/download.png" max-width="100%" style="border-radius:10px;" height="70vh"></v-img>
          </div>
         </v-card>
          <v-card flat  color="#e3ded1" class="grey lighten-5 pa-2 mt-4 rounded-xl" lg="" >
            <div class="d-flex justify-center">
          <v-btn fab small class="mx-2"
            ><v-icon size="20">mdi-microphone-outline</v-icon></v-btn
          >
          <v-btn fab small class="mx-2"
            ><v-icon size="20">mdi-video-outline</v-icon></v-btn
          >
          <v-btn fab small class="mx-2"
            ><v-icon size="20">mdi-monitor-share</v-icon></v-btn
          >
          <v-btn  fab small class="mx-2" color="error"  @click="$router.push('/')">
        <v-icon style="transform: rotate(135deg);" size="20"> mdi-phone </v-icon>
      </v-btn>
            </div>
          </v-card>
        </v-col>

        <v-col cols="12" lg="2" md="2" order="1" order-lg="2" order-md="2" >
          <v-card flat color="#e3ded1" class="grey lighten-5 pa-4 rounded-xl right-col ">
          <v-row  class="">
            <v-col v-for="(dt, i) in dataku" :key="i" cols="6" lg="12" md="12">
              <v-img :src="'/' + dt.img" style="border-radius:10px;"></v-img>
            </v-col>
          </v-row>
          </v-card>
        </v-col>


      </v-row>
    </v-container>


  </div>
</template>
<script>
import Peer from "skyway-js";

export default {
  data() {
    return {
      localStream: null,
      peerId: "",
      inputId: "",
      peer: null,
      room: null,
      peers: [],
      dataku: [
        { img: "download.png" },
        { img: "download.png" },
        { img: "download.png" },
        { img: "download.png" },
        { img: "download.png" },
        { img: "download.png" },
      ],
    };
  },
  mounted() {
    this.peer = new Peer({
      key: "abe02cb1-4e86-49d6-87f0-d682a3fd6a5f",
      debug: 3,
    });
    this.peer.on("open", (peerId) => {
      this.peerId = peerId;
    });
  },
  methods: {
    startDisplay() {
      if (!navigator.mediaDevices.getDisplayMedia) {
        alert(`Error: Your device cannot use this type of stream.`);
        return;
      }
      navigator.mediaDevices
        .getDisplayMedia()
        .then((stream) => {
          this.localStream = stream;
        })
        .then(this.joinRoom)
        .catch((err) => {
          alert(`Error: Your device cannot use this type of stream.`);
        });
    },
    startVoice() {
      navigator.mediaDevices
        .getUserMedia({ video: false, audio: true })
        .then((stream) => {
          this.localStream = stream;
        })
        .then(this.joinRoom)
        .catch((err) => {
          alert(`Error: Your device cannot use this type of stream.`);
        });
    },
    startVideo() {
      navigator.mediaDevices
        .getUserMedia({ video: true, audio: true })
        .then((stream) => {
          this.localStream = stream;
        })
        .then(this.joinRoom)
        .catch((err) => {
          alert(`Error: Your device cannot use this type of stream.`);
        });
    },
    joinRoom() {
      const peer = this.peer;
      if (this.room) {
        this.room.replaceStream(this.localStream);
        return;
      }
      this.room = peer.joinRoom(this.$route.query.roomId, {
        mode: "mesh",
        stream: this.localStream,
      });

      this.room.once("open", () => {
        console.log("=== You joined ===\n");
      });
      this.room.on("peerJoin", (peerId) => {
        console.log(`=== ${peerId} joined ===\n`);
      });

      this.room.on("peerLeave", (peerId) => {
        this.peers = this.peers.filter((p) => p.peerId !== peerId);
      });

      this.room.on("stream", async (stream) => {
        this.peers = this.peers.filter((p) => p.peerId !== stream.peerId);
        this.peers.push({ peerId: stream.peerId, stream: stream });
      });
    },
  },
  destroyed() {
    if (this.room) this.room.close();
    if (this.peer) this.peer.destroy();
  },
};
</script>
<style>
.parent{
  overflow: hidden;
}
::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  display: none;
}

::-webkit-scrollbar-thumb {
  background: #BDBDBD;
  border-radius: 3px;
}

#cameraView {
  transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg); /* Safari and Chrome */
  -moz-transform: rotateY(180deg); /* Firefox */
}
#my-video {
  border-radius: 10px;
  /* max-width: 50vw;
  max-height: 30vh; */
}
.right-col {
  overflow-y: scroll;
  height: 85vh;
}
</style>
