<template>
  <div>
    <div class="bg-head">
      <div class="text-h4 font-weight-medium white--text text-center py-3">
        Catatan harian {{datalogin }}
      </div>
      .
      <div class="link-pindah text-h6 d-flex justify-center  font-weight-regular white-text text-center pb-2">
        <nuxt-link to="/beranda" class="white--text text-decoration-none mr-5">Home</nuxt-link>
        <nuxt-link to="/beranda/create" class="white--text text-decoration-none mr-5">Catatan Baru</nuxt-link>
        <v-btn @click="getses" class="ma-3"> getsession</v-btn>
        <div class=""> <v-btn color="primary" @click="logout">logout</v-btn></div>
      </div>
    </div>
  </div>
</template>

<script>
import supabase from '~/plugins/supabase.js'
export default {
  data() {
    return {

      sessionuser: null,
      datalogin:null
    }
  },

  methods: {
    async getses() {
      this.sessionuser = await supabase.auth.getUser();
      this.datalogin= this.sessionuser?.data?.user?.id
      // this.datalogin= this.sessionuser?.data?.session?.user
      // this.datalogin= this.sessionuser?.data?.session?.user?.email ||'Email tidak ada'
      console.log(this.sessionuser.data?.user)
      // this.$store.dispatch("users/login", this.sessionuser?.data?.user);
    },
    async logout() {
      try {
        const { error } = await supabase.auth.signOut();
        if (error) {
          console.log(error)
        } else {
          this.$toast.success("Logout berhasil")
          this.$store.dispatch("users/logout");
        }
      } catch (error) {
      }
    }
  },
  created() {
    this.getses()
  },
}
</script>

<style>
.bg-head {
  background: #2196F3;
}
</style>
