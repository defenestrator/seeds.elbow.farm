<script>
    import addToCart from '../addToCart'
    export default {
        data() {
            return {
                selectedPack: 0
            }
        },
        props: {
            product: Object
        },

        mixins: [addToCart],

    }
</script>

<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pagetitle">
                <h1>{{ product.name }}</h1>
            </div>
            <div class="col-lg-12"><h2>{{ product.genetics }}</h2></div>
        </div>
        <div class="row">
            <div class="col-lg-8 info">
                <img :src="product.image"
                    :title="product.name + ' ' + product.feminized"
                    :alt="product.name + ' ' + product.feminized" />
            </div>
            <div class="col-lg-4 info">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Buy {{product.feminized}} {{product.name}} seeds
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <form action="POST" target="/cart">
                                <p v-if="product.seed_packs === undefined || product.seed_packs == 0">Out of stock</p>
                                <div class="form-group" v-else>
                                    <div v-bind:key="pack.id" v-for="pack in product.seed_packs" class="form-group custom-control custom-radio custom-control-inline">
                                        <input type="radio"
                                            v-model.number="selectedPack"
                                            class="custom-control-input"
                                            :id="'seed-pack-' + pack.id"
                                            :name="'seed-pack-' + pack.id"
                                            :value="pack.id"
                                        />
                                        <label class="custom-control-label" :for="'seed-pack-' + pack.id">
                                            {{ pack.qty_per_pack }} seeds ${{ pack.price }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <label for="quantity" class="form-label form-inline"></label>
                                    <input v-model.number="product.quantity" class="form-control form-inline input-group-sm" style="width:60px;"
                                        type="number" :name="'quantity-' + product.id" value="1" min="1" max="10" :id="'quantity-'+product.id" />
                                    &nbsp;
                                    <button role="button" id="buy-now"
                                        class="btn btn-primary form-inline input-group-sm" disabled>
                                        BUY
                                    </button>
                                    &nbsp;
                                    <button role="button" id="add-to-cart"
                                        class="btn btn-outline-gray form-inline input-group-sm"
                                        v-on:click.stop.prevent="addToCart(product, selectedPack)">
                                        ADD TO CART
                                    </button>

                                </div>
                            </form>
                            <p>{{ product.description }}</p>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <p>
                        Min flowering time: {{ product.flowering_time_min_weeks}} weeks
                    </p>
                    <p>
                        Max flowering time: {{ product.flowering_time_max_weeks}} weeks
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
</div>
</template>
