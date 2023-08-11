<template>
  <div>
    <v-container>
      <v-card class="pa-8">
        <div class="display-1 mb-4">
          Silahkan login akun
          <!-- <v-btn @click="logout"> logout</v-btn> -->
        </div>
        <v-form @submit.prevent="login">
          <div class="input-t">
            <v-text-field label="Email" required v-model="emailinput" type="email">
            </v-text-field>
          </div>
          <div class="input-t">
            <v-text-field label="Password" required v-model="passinput" type="password">
            </v-text-field>
          </div>
        </v-form>
        <v-btn color="primary" @click="login">Login</v-btn>
        <v-btn @click="getses" class="ma-3"> getsession</v-btn>
      </v-card>
    </v-container>
  </div>
</template>
<script>
import supabase from '~/plugins/supabase.js'
export default {
  middleware:'middlewareauth',
  data() {
    return {
      emailinput: 'iza@gmail.com',
      passinput: '123123',
      sessionuser: null
    }
  },
  methods: {
    async login() {
      try {
        const { data, error } = await supabase.auth.signInWithPassword({
          email: this.emailinput,
          password: this.passinput,
        })
        // this.$router.push('/login')
        if (error) {

          console.log(error)
        } else {
          this.sessionuser = await supabase.auth.getUser();
          this.$store.dispatch("users/login", this.sessionuser.data?.user?.id);
          // this.$store.dispatch("users/getcookienya", this.sessionuser.data.session);
          this.$toast.success("Login berhasil");
          console.log(this.sessionuser)
        }
      } catch (er) {
        console.log({
          'error catch': er,
          // 'error register':error,
        })
      }
    },
    async getses() {
      this.sessionuser = await supabase.auth.getSession();
      console.log(this.sessionuser.data.session)
      // this.$store.dispatch("users/login", this.sessionuser.data.session);
    },

    async logout() {
      const { error } = await supabase.auth.signOut();
      if (error) {
        console.log(error)
      } else {
        alert('berhasil logout')
      }
    }

  },
}
</script>
