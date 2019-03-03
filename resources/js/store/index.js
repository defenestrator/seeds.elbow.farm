import cart from './modules/cart'
import products from './modules/products'
import * as actions from './actions'
import * as mutations from './mutations'
import Vuex from 'vuex'
const state = {

}
export default new Vuex.Store({
  modules: {
    state,
    cart,
    products,
    actions,
    mutations
  },
})

