<template>
  <div>
    <v-container>
      <v-card class="pa-8">
          <div class="display-1 mb-4">
              Silahkan buat akun
          </div>
        <v-form @submit.prevent="register">
          <div class="input-t">
            <v-text-field label="Userame" v-model="usernameinput"   type="text">
            </v-text-field>
          </div>
          <div class="input-t">
            <v-text-field label="Email" required v-model="emailinput"  type="email">
            </v-text-field>
          </div>
          <div class="input-t">
            <v-text-field label="Password" required v-model="passinput"  type="password">
            </v-text-field>
          </div>
        </v-form>
        <v-btn color="primary" @click="register">Registrasi</v-btn>
      </v-card>
    </v-container>
  </div>
</template>
<script>
import supabase from '~/plugins/supabase.js'
export default {
  data() {
    return {
      usernameinput: 'iza',
      emailinput: 'iza@gmail.com',
      passinput: '123123',
    }
  },
  methods: {
  async  register() {
      try {
        const {data, error}= await supabase.auth.signUp({
          email:this.emailinput,
          password: this.passinput,
          options:{
            data:{
              username:this.usernameinput
            }
          }
      })
          // this.$router.push('/login')
          if(error){

            console.log(error)
          }else{

            console.log(data)
          }
        } catch (er) {
          console.log({
            'error catch':er,
            // 'error register':error,
          })
        }
    }
  },
}
</script>
