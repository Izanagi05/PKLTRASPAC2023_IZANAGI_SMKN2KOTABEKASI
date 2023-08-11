import supabase from "~/plugins/supabase.js";
export const state = () => {
  return {
    nganu: false,
    authenticated: null,
  };
};

export const mutations = {
  loginsupa(state, payload) {
    // if(payload){

    state.authenticated = payload;
    state.nganu = !!payload;
    //   console.log("instif"+state.authenticated)
    // }else{
    //   state.authenticated =null
    //   console.log("inst"+state.authenticated)

    // }
  },
};
export const actions = {
  async login({ commit }, payload) {
    // this.$cookies.set('cekuserlogin', payload)
    const datanya = await supabase.auth.getUser();
    commit('loginsupa',payload)
    this.$router.push("beranda");
  },
  async logout({ commit }) {
    // this.$cookies.remove("cekuserlogin");
    window.location.replace("/login");
  },
  async getcookienya({ commit }, payload) {
    // const datanya =this.$cookies.get('cekuserlogin')
    const datanya = await supabase.auth.getUser();
    commit("loginsupa", datanya.data.data?.user?.id);
  },
};
