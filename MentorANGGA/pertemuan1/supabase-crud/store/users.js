import supabase from "~/plugins/supabase.js";
export const state = () => {
  return {
    // nganu: false,
    authenticated: null,
  };
};

export const mutations = {
  loginsupa(state, payload) {
    // if(payload){
    state.authenticated = payload;
  },
};
export const actions = {
  async login({ commit }, payload) {
    const dataku= this.$cookies.set('cekuserlogin', payload)
    commit('loginsupa',dataku)
    this.$router.push("beranda");
  },
  async logout({ commit }) {
    this.$cookies.remove("cekuserlogin");
    window.location.replace("/login");
  },
  async getcookienya({ commit }, payload) {
    const datanya =this.$cookies.get('cekuserlogin')
    // const datanya = await supabase.auth.getUser();
    commit("loginsupa", datanya);
  },
};
