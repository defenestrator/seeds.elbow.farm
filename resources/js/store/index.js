import cart from './modules/cart'
import products from './modules/products'
import * as actions from './actions'
import * as mutations from './mutations'
import Vuex from 'vuex'
import createLogger from 'vuex/dist/logger'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

const plugins = debug ? [createLogger({})] : []

export default new Vuex.Store({
  modules: {
    cart,
    products,
    actions,
    mutations,
    strict: logger,
    plugins	
  }
