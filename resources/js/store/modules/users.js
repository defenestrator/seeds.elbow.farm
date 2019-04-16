// initial state
const state = {
  all: []
}

// getters
const getters = {}

// actions
const actions = {
  getUser ({ commit }) {
    getUser(user => {
      commit('setUser', user)
    })
  }
}

// mutations
const mutations = {
  setProducts (state, user) {
    state.all = user
  },
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
