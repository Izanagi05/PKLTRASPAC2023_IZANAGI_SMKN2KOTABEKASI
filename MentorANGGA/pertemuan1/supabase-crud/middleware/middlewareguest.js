import supabase from '~/plugins/supabase.js'
export default async function ({store,redirect}){
  // const sessionuser= await supabase.auth.getSession();

  // store.dispatch('users/getcookienya')
  // store.dispatch('users/login')
//   const datanyaa=await supabase.auth.getUser()
//   console.log(datanyaa)
//   if( !datanyaa?.data?.user){
//     // this.$router.push('/login');
//     return redirect('/login')

//   }
// }
  const datanyaa=await supabase.auth.getUser()
  console.log(datanyaa)
  if( !store.state.users.authenticated){
    // this.$router.push('/login');
    return redirect('/login')

  }
}
