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
            <div class="col-sm-12 pagetitle">
                <h1>{{ product.name }}</h1>
            </div>
            <div class="col-sm-12"><h2>{{ product.genetics }}</h2></div>
        </div>
        <div class="row">
            <div class="col-md-7 info">

                <img v-if="product.images === null || product.images === undefined"
                :src="product.image"
                :alt="product.name + ' ' + product.feminized + ' seeds'"
                :title="product.name  + ' ' + product.feminized + ' seeds'"
                />

                <img v-else
                :src="product.images.large"
                :alt="product.name + ' ' + product.feminized + ' seeds'"
                :title="product.name  + ' ' + product.feminized + ' seeds'"
                />

            </div>
            <div class="col-md info">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Buy {{product.feminized}} {{product.name}} <div class="s1" v-if="product.s1 === 1">S1
                <span class="tooltiptext">
                    Breeders use various techniques to encourage the production of male
                    flowers on female plants. When this pollen is used to pollinate
                    the same "mother", or her clones, the seeds are called an "S1" generation.
                </span></div> seeds
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

<style>

/* Tooltip container */
.s1 {
  position:relative;
  display:inline-block;
  border-bottom: 1px dotted hsla(212,25%, 27%, 0.95) !important;
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
  font-size:0.75rem;
  z-index: 1;
  background-color:hsla(212,25%, 27%, 0.95);
  color:white;
}

.s1:hover .tooltiptext {
  visibility: visible;
}
</style>
