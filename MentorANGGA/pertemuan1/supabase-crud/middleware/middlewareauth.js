// import supabase from '~/plugins/supabase.js'
// export default async function ({redirect}){
//   const sessionuser= await supabase.auth.getSession();
//     if( sessionuser.data.session){
//       return redirect('/beranda')
//     }else{

//     }
// }

import supabase from '~/plugins/supabase.js'
export default async  function ({store,redirect}){
  // const sessionuser= await supabase.auth.getSession();

  store.dispatch('users/getcookienya')
  // const datanyaa=await supabase.auth.getUser()
  // store.dispatch('users/login')
  if( store.state.users.authenticated){

    return redirect('/beranda')

    // console.log("tes".store.state.users.authenticated)

    }
}
//   // store.dispatch('users/getcookienya')
//   const datanyaa=await supabase.auth.getUser()
//   // store.dispatch('users/login')
//   if( datanyaa?.data?.user !==null){

//     return redirect('/beranda')

//     // console.log("tes".store.state.users.authenticated)

//     }
// }

