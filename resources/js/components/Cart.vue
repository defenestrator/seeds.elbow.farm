<script>
    import Cart from '../Cart'
    import axios from 'axios'

    export default {
        props: {
            initial_user: Object,
            initial_addresses: Array,
            payment_methods: Array,
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
                customerNotes: '',
                auth: false,
                pay_methods: this.payment_methods,
                payment_method: '',
                addresses: this.initial_addresses,
                address: '',
                currentAddress: {
                    'id': null,
                    'user_id': this.initial_user.id,
                    'address_1': '',
                    'address_2': '',
                    'city': '',
                    'state': '',
                    'country': '',
                    'postcode': '',
                    'ship_to_name': '',
                },
                notReady: true
            }
        },
        methods: {
            updateAddress() {
                axios.put('/shipping_addresses/', this.currentAddress, this.headers)
                    .then(response => {
                        this.currentAddress = response.data
                        swal({
                            title: 'Added',
                            text: 'Shipping Addresses'
                        })
                        this.$emit('update:initial_addresses', this.addresses)
                        this.address = response.data.id
                        this.getAddresses()
                        return Promise.resolve(response)
                    })
                    .catch(error => {
                        return Promise.reject(error)
                    })
            },
            getAddresses() {
                axios.get('/shipping_addresses/', this.headers)
                    .then(response => {
                        this.addresses = response.data
                        return Promise.resolve(response)
                    })
                    .catch(error => {
                        return Promise.reject(error)
                    })
            },
            async processCheckout(cart) {
                let invoice = {
                    'user_id': cart.user.id,
                    'items': cart.items,
                    'payment_method_id': this.payment_method,
                    'total': this.cart.total,
                    'customer_notes': this.customerNotes,
                    'shipping_address_id': this.address
                }
                axios.post('/invoices', invoice, this.headers)
                    .then(response => {
                        localStorage.clear()
                        Promise.resolve(response)


                      swal({
                    title: 'Thank you!',
                    text: "Order placed, expect an email soon!",
                    button: {
                        text: 'Joy!',
                        className: "happySwalButton",
                        icon: 'success'
                    },
                    timer: 5000
                    })
                    setTimeout(function() { location.href = '/'}, 5000)

                    })
                    .catch(error => {
                        return swal({
                    title: 'Uh Oh!',
                    text: "Something went horribly wrong. Refresh this page and try again?",
                    button: {
                        text: 'oops',
                        className: "sadSwalButton",
                        icon: 'error'
                    }
                })
                        console.log('Error: ' + error)
                        return Promise.reject(error)
                    })
            }
        },
        watch: {
            address: function () {
                if (this.address !== null && this.address !== '' && this.payment_method !== null && this
                    .payment_method !== '') {
                    return this.notReady = false
                }
                return this.notReady = true
            },
            payment_method: function () {
                if (this.address !== null && this.address !== '' && this.payment_method !== null && this
                    .payment_method !== '') {
                    return this.notReady = false
                }
                return this.notReady = true
            },

        },
        mounted() {
            this.getCart()
        }
    }
</script>

<template>
    <div class="container cart">
        <div style="margin-top:2em;">
            <h1>Your Cart
                <span v-show="cart.active === true"> = ${{cart.total}}</span>
            </h1>
        </div>
        <div v-if="cart.active === true" class="row">
            <div class="col-md-12">
                <div class="container">
                    <hr>
                    <div class="row" v-bind:key="item.id" v-for="item in this.cart.items">
                        <div class="col-md-12">
                            <div class="row py-2" style="font-size:1.1em; border-bottom:1px solid #ccc;">
                                <div class="col-1">
                                    <i v-on:click="incrementProduct(item)" class="fa fa-plus-circle"></i>
                                    <i v-on:click="decrementProduct(item)" class="fa fa-minus-circle"></i>
                                </div>
                                <div class="col-3 d-none d-sm-block">
                                    <img class="info" :src="item.strainImage" :alt="item.strainName"
                                        :title="item.strainName" style="width:90px;margin:0.3rem;">
                                </div>
                                <div class="col-6">
                                    {{ item.pivot.quantity }}:
                                    {{ item.strainName}} -
                                    {{  item.qty_per_pack }} pack.
                                </div>
                                <div class="col-2">
                                    ${{ item.lineTotal }}
                                    <i v-on:click="removeProduct(item)" class="fa fa-times-circle fa-lg"
                                        style="margin:0 0.2em; padding: 0; color:red; background-color:white; border-radius:50%;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:2em;">
                        <div class="col-md-3 offset-md-9">
                            <h4>Total: ${{ cart.total }}.00</h4>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <select id="payment" name="payment" v-model="payment_method" class="form-control select">
                                <option value="">--Please choose a Payment Method--</option>

                                <option v-bind:key="method.id" v-for="method in pay_methods" :value="method.id">
                                    {{ method.name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div v-if="addresses.length >= 1" class="form-group row">
                        <div class="col-12">
                            <select id="addresses" name="addresses" v-model="address" class="form-control select">
                                <option value="">--Please Choose a Shipping Address--</option>

                                <option v-bind:key="address.id" v-for="address in addresses" :value="address.id">
                                    {{ address.ship_to_name }} {{address.address_1}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <button class="btn btn-primary" style="margin:1em;"
                            v-on:click.prevent.stop="updateAddress()">Save</button>
                        <div class="col-12">
                            <form class="form-horizontal new-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>ship_to_name</p>
                                        <input id="ship_to_name" name="ship_to_name" class="form-control input"
                                            type="text" placeholder="Ship to this name"
                                            v-model="currentAddress.ship_to_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>address_1:</p>
                                        <input id="chuckers_paradise" name="address_1" class="form-control input"
                                            type="text" placeholder="Address Line 1" v-model="currentAddress.address_1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>address_2:</p>
                                        <input id="address_2" name="address_2" class="form-control input" type="text"
                                            placeholder="Address Line 2" v-model="currentAddress.address_2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>City:</p>
                                        <input id="city" name="city" class="form-control input" type="text"
                                            placeholder="City" v-model="currentAddress.city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>state:</p>
                                        <input id="state" name="state" class="form-control input" type="text"
                                            placeholder="State" v-model="currentAddress.state">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>country:</p>
                                        <input id="country" name="country" class="form-control input" type="text"
                                            placeholder="country" v-model="currentAddress.country">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <p>postcode:</p>
                                        <input id="postcode" name="postcode" class="form-control input" type="text"
                                            placeholder="postcode" v-model="currentAddress.postcode">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button style="width:100%;" class="btn btn-primary"
                                            v-on:click.prevent.stop="updateAddress()">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-dark btn-outline-gray" style="margin:0 0 0.5rem; width:100%;"
                                v-on:click="processCheckout(cart)" :disabled="notReady">
                                Checkout
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea v-model="customerNotes" placeholder="leave us a note." style="width:100%;"></textarea>
                            <br>
                            <p style="white-space: pre-line;">{{ customerNotes }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div v-else>
            <h4>Your cart is empty.</h4>
        </div>
    </div>
</template>

<style>
    table {
        position: relative;
    }

    table tr {
        height: 1em;
    }

    td {
        overflow: hidden;
        white-space: nowrap;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll {
        overflow: auto;
    }

    .cart li {
        list-style-type: none;
        border-bottom: 1px solid #ccc;

    }

    i {
        padding: 0 0.1rem;
        cursor: pointer;
    }

    ul {
        padding-left: 0;
    }
</style>
