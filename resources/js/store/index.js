import cart from './modules/cart'
import products from './modules/products'
import * as actions from './actions'
import Vue from 'vue'
import * as mutations from './mutations'

import Vuex from 'vuex'

import createLogger from 'vuex/dist/logger'

const debug = process.env.NODE_ENV !== 'production'

const plugins = debug ? [createLogger({})] : []

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    state: {},
    cart,
    products,
    actions,
    mutations,
    strict: debug,
    plugins
  }
})
