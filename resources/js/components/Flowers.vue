<script>
    import Cart from '../Cart'
    export default {
        name: 'Flowers',
        mixins: [Cart],
        props: {
            products: Array
        },
        data: function () {
            return {
                columns: 3,
                searchQuery: "",
            };
        },
        computed: {
            filteredProducts: function () {
                var filterKey = _.trim(
                    this.searchQuery && this.searchQuery.toLowerCase()
                );
                var products = this.products;
                if (filterKey) {
                    products = this.products.filter(function (row) {
                        return Object.keys(row).some(function (key) {
                            return (
                                String(row[key])
                                .toLowerCase()
                                .indexOf(filterKey) > -1
                            );
                        });
                    });
                }
                return _.chunk(products, 3);
            }
        },
        filters: {
            capitalize: function (str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            },
        },
        methods: {
            clearSearchQuery() {
                this.searchQuery = "";
            }
        },
    };

</script>

<template>
    <div class="container text-center">
        <div class="row" v-bind:key="products.uuid" v-for="products in filteredProducts">
            <div class="col-sm-4 info strainlisting" v-bind:key="item.uuid" v-for="item in products">
                <hr>
                <a :href="'/strains/' + item.uuid">
                    <h4 style="">{{item.name}} <div class="s1" v-if="item.s1 === 1">S1
                            <span class="tooltiptext">
                                Breeders use various techniques to encourage the production of male
                                flowers on female plants. When this pollen is used to pollinate
                                the same "mother", or her clones, the seeds are called an "S1" generation.
                            </span>
                        </div>
                    </h4>
                    <h5>{{ item.genetics }}</h5>
                </a>

                <a :href="'/flowers/' + item.uuid">
                    <img v-if="item.images === null" :src="item.image" :alt="item.name" :title="item.name" />
                    <img v-else :src="item.images.large" :alt="item.name" :title="item.name" />
                </a>
                <h5 style="margin-top:1em;"> Premium Cannabis Flower</h5>
                <form action="POST" target="/cart">
                    <p v-if="item.inventory === undefined || item.inventory == 0">Out of stock</p>
                    <div v-else class="form-group form-inline" style="justify-content: center;">
                        <input v-model.number="item.quantity" class="form-control form-inline input-group-sm"
                            style="max-width:60px;margin-bottom:0.1rem;" type="number" :name="'quantity-' + item.uuid"
                            min="1" max="10" :id="'quantity-' + item.uuid">
                        &nbsp;
                        <button style="margin-bottom:0.1rem;" role="button" :id="'buy-now-' + item.uuid"
                            class="btn btn-primary form-inline input-group-sm" v-on:click.stop.prevent="addAndCheckout(item, selectedPack)">BUY</button>
                        &nbsp;
                        <button style="margin-bottom:0.1rem;" role="button" :id="'add-to-cart-' + item.uuid"
                            class="btn btn-outline-gray form-inline input-group-sm"
                            v-on:click.stop.prevent="addToCart(item)">ADD TO CART</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
    /* Tooltip container */
    .s1 {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted hsla(212, 25%, 27%, 0.95) !important;
    }

    /* Tooltip text */
    .tooltiptext {
        visibility: hidden;
        width: 120px;
        text-align: center;
        padding: 5px;
        border-radius: 6px;
        /* Position the tooltip text - see examples below! */
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -60px;
        font-size: 0.75rem;
        z-index: 1;
        color: hsla(212, 25%, 27%, 0.95);
        background-color: white;
    }

    .s1:hover .tooltiptext {
        visibility: visible;
    }

</style>
