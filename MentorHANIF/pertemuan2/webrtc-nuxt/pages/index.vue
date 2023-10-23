<template>
  <div>
      <vue-webrtc ref="webrtc" width="100%" roomId="sample-room"></vue-webrtc>

  </div>
</template>

<script>
  import { VueWebRTC } from 'vue-webrtc'
export default {
  components: {
    'vue-webrtc': VueWebRTC

  },
  computed: {
    isClient() {
      return process.client; // properti process.client
    }
  }
};
</script>
