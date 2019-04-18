<script>
import Cart from '../Cart'
import axios from 'axios'

export default {
    props:{
        initial_user: String
    },
    mixins: [Cart],
    data() {
        return {
            user: this.initial_user,
            cart: {
                'active': true,
                'user': this.initial_user,
                'items': {},
                'total': 0
            },
            auth: false
        }
    },
   methods: {
    },
    watch: {
    },
    mounted() {
        this.getCart()
    }
}
</script>

<template>
        <div class="container cart">
            <div v-show="cart.active === true" >
                <h1>Your Cart = ${{cart.total}}</h1>
            </div>
            <div v-if="cart.active === true" class="row">
                <div class="col-md-12">
                    <div class="container">
                            <hr>
                            <div class="row" v-bind:key="item.id" v-for="item in this.cart.items">
                                <div class="col-md-12">
                                    <ul>
                                        <li style="font-size:1.4em;">
                                            <i v-on:click="incrementProduct(item)" class="fa fa-plus-circle fa-lg"></i>
                                            <i v-on:click="decrementProduct(item)" class="fa fa-minus-circle fa-lg"></i>
                                            <img :src="item.strainImage" :alt="item.strainName" :title="item.strainName" style="width:90px;margin:0.3rem;">
                                            {{ item.pivot.quantity }}:
                                            {{ item.strainName}} -
                                            {{  item.qty_per_pack }} pack.
                                            ${{ item.lineTotal }}
                                            <i v-on:click="removeProduct(item)" class="fa fa-times-circle fa-lg" style="margin:0 0.2em; padding: 0; color:red; background-color:white; border-radius:50%;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 offset-md-9">
                                    <h4>Total: ${{ cart.total }}.00</h4>
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
            <div v-else><h4>Your cart is empty.</h4></div>
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
    .cart li {
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
