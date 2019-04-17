<script>
import store from '../store'
import Cart from '../Cart'
import axios from 'axios'

export default {
    props:{
        initial_user: String
    },
    store,
    mixins: [Cart],
    data() {
        return {
            cart: {
                active: false
            },
            cartActive: false,
            cartSlider: null,
            cartSliderButton: null
        }
    },
   methods: {
        toggleCartSlider() {

            if (this.cartSlider.offsetWidth === 0) {
                this.cartActive = true
                return this.getCart()
            } else {
                this.cartActive = false
                return
            }

        },
        getCart() {

        axios.get('/cart', this.headers)
            .then(response => {
                Promise.resolve(response)
                this.cart.items = response.data.cart.seed_packs
                this.cart.total = response.data.total
                return this.cart.active = true
            })
            .catch(error => {
                Promise.reject(error)
                return this.cart.active = false
                //  swal({
                //     title: 'Uh Oh!',
                //     text: "Retrieval of Cart failed",
                //     button: {
                //         text: 'Despair!',
                //         className: "sadSwalButton",
                //         icon: 'error'
                //     }
                // })
            })
        }
    },

    watch: {
        cartActive: function (val) {
            if (val === true) {
                this.cartSlider.classList.add('cart-slider-active')
                this.cartSliderButton.classList.remove('fa-shopping-cart')
                this.cartSliderButton.classList.add('fa-window-close')
                this.cartSliderButton.style.backgroundColor = 'transparent'
            } else {
                this.cartSliderButton.classList.remove('fa-window-close')
                this.cartSliderButton.classList.add('fa-shopping-cart')
                this.cartSlider.classList.remove('cart-slider-active')
                this.cartSliderButton.style.backgroundColor = 'hsla(212,25%, 27%, 0.95)'
            }
        }

    },

    mounted() {
        this.cartSlider = document.getElementById('cart-slider')
        this.cartSliderButton = document.getElementById('cart-slider-button')
        this.tableWrapper = document.getElementById('table-wrapper')


    }

}
</script>

<template>
<div class="d-flex flex-row-reverse cart-slider-wrapper">
    <div id="cart-slider" class="cart-slider">
        <div class="container cart-slider-contents">
            <div>
                <span style="width:25%;font-size:1.2rem; margin:0 1em 0;">Cart</span>
                <button v-if="cart.active === true"
                    class="btn btn-dark btn-outline-gray" style="margin:0 0 0.5rem;"
                v-on:click="startCheckout()">Full Cart</button>
            </div>
            <div class="row">
                <div id="table-wrapper" class="col-sm-12 table-wrap">
                    <div v-if="cartActive === true" class="container">
                            <hr>
                            <div class="row" v-bind:key="item.id" v-for="item in this.cart.items">
                                <div class="col-xs-3">
                                    <img class="d-xs-none" :src="item.strainImage" style="width:40px;margin-bottom:0.2rem;" />
                                    <p>{{ item.strainName}} - {{  item.qty_per_pack }} pack</p>
                                </div>
                                <div class="col-xs-3 ">
                                    <p><span class="d-block d-xs-none">Qty:<br></span>{{ item.pivot.quantity }}</p>
                                </div>
                                <div class="col-xs-3 d-xs-none"><span class="d-block">Price:</span>${{ item.price }}</div>
                                <div class="col-xs-3d-xs-none"><span class="d-block">Total:</span>${{ item.lineTotal }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>Total:</h4>
                                </div>
                                <div class="col-sm-3">
                                    <h4> ${{ cart.total }}.00</h4>
                                </div>
                            </div>
                    </div>
                    <div v-else><p>...is empty.</p></div>
                </div>
            </div>
        </div>


    </div>
    <i class="fa fa-lg fa-dark fa-shopping-cart cart-slider-button" id="cart-slider-button"
        v-on:click="toggleCartSlider()"></i>
</div>

</template>

<style>
table { position:relative; }
table tr { height:1em;  }
td { overflow:hidden; white-space: nowrap; }
.table-wrap {
    position:relative;
}
.table-scroll {
    overflow:auto;
}
</style>
