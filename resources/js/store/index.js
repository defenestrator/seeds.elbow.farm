import cart from './modules/cart'
import products from './modules/products'
import user from './modules/user'
import * as actions from './actions'
import * as mutations from './mutations'
import Vuex from 'vuex'
import Vue from 'Vue'
import createLogger from 'vuex/dist/logger'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    cart,
    products,
    user,
    actions,
    mutations
  },
  strict: debug,
  plugins: debug ? [createLogger()] : []
})

