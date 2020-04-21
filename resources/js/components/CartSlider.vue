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
            user: this.initial_user,
            cart: {
                'active': false,
                'user': this.initial_user,
                'items': {},
                'total': 0
            },
            auth: false,
            cartActive: false,
            cartSlider: null,
            cartSliderButton: null
        }
    },
   methods: {
        toggleCartSlider() {
            if (this.cartSlider.offsetWidth === 0) {
                this.cartActive = true
                this.getCart()
                this.$emit('update:cart', this.cart)
                return
            } else {
                this.cartActive = false
                return
            }

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


    }

}
</script>

<template>
<div class="d-flex flex-row-reverse cart-slider-wrapper">
    <div id="cart-slider" class="cart-slider">
        <div class="container cart-slider-contents">
            <div v-show="cart.active === true" >
                <span style="width:25%;font-size:1.2rem; margin:0 1em 0;">Cart Preview</span>
                <button class="btn btn-dark btn-outline-gray"
                style="margin:0 0 0.5rem;"
                v-on:click="startCheckout()">
                    View Cart
                </button>
                <button class="btn btn-dark btn-outline-gray"
                style="margin:0 0 0.5rem;"
                v-on:click="deleteCart()">
                    Clear Cart
                </button>
            </div>
            <div v-if="cart.active === true" class="row">
                <div class="col-12">
                    <div class="container">
                            <hr>
                            <div class="row" v-bind:key="item.id" v-for="item in this.cart.items">
                                <div class="col-12">
                                    <ul>
                                        <li>
                                            <i v-on:click="incrementProduct(item)" class="fa fa-plus-circle fa-sm"></i>
                                            <i v-on:click="decrementProduct(item)" class="fa fa-minus-circle fa-sm"></i>
                                            {{ item.pivot.quantity }}:
                                            {{ item.strainName}} -
                                            {{  item.qty_per_pack }} pack.
                                            ${{ item.lineTotal }}
                                            <i v-on:click="removeProduct(item)" class="fa fa-times-circle fa-sm" style="margin:0 0.2em; padding: 0; color:red; background-color:white; border-radius:50%;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h4 style="color:white;">Total:</h4>
                                </div>
                                <div class="col-3">
                                    <h4 style="color:white;"> ${{ cart.total }}.00</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-dark btn-outline-gray"
                                    style="margin:0 0 0.5rem; width:100%;"
                                    v-on:click="startCheckout()">
                                        Checkout
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div v-else><h4 style="color:white;">Your cart is empty.</h4></div>
            <div v-show="cart.active === true" >

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
    .cart-slider-contents li {
        list-style-type: none;
        border-bottom: 1px solid #ccc;

    }
    i {
    padding:0 0.1rem;
    cursor:pointer;
    }

    ul {
        padding-left:0;
    }
</style>
