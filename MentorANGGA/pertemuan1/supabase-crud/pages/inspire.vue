<template>
  <v-row>
    <v-col class="text-center">
      <img
        src="/v.png"
        alt="Vuetify.js"
        class="mb-5"
      >
      <blockquote class="blockquote">
        &#8220;First, solve the problem. Then, write the code.&#8221;
        <footer>
          <small>
            <em>&mdash;John Johnson</em>
          </small>
        </footer>
      </blockquote>
    </v-col>
  </v-row>
</template>

<script>
import axios from "axios";
export default {
  name: 'InspirePage',

  methods: {
    gettt(){
    //   const apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Inl5a2pmdGRvdmtqdXZ3Z3l6emlnIiwicm9sZSI6ImFub24iLCJpYXQiOjE2OTA1MDkxMjMsImV4cCI6MjAwNjA4NTEyM30.QcnhrOvQTGUG9-BoS9Q0RI-M3c15X3Z4LqpZ5FtZAcg'; // Ganti dengan API key Anda
    // const headers = { Authorization: `Bearer ${apiKey}` };
    //  axios.get('https://yykjftdovkjuvwgyzzig.supabase.co/rest/v1/catatan?select=*', {headers}).then(respon=>{//2
    //     console.log(respon.data + "p")
    //   })
    }
  },
  created() {
    this.gettt()
  },
}
</script>
