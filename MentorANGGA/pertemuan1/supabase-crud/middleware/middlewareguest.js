// import supabase from '~/plugins/supabase.js'
export default async function ({store,redirect}){
  // const sessionuser= await supabase.auth.getSession();
  store.dispatch('users/getcookienya')
  if( !store.state.users.authenticated){
    // this.$router.push('/login');
    return redirect('/login')

  }
}
